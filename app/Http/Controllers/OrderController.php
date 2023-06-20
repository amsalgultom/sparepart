<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout($id)
    {
        $client = new Client();

        $response = $client->request('GET', config('services.rajaongkir.base_url') . '/city', [
            'headers' => [
                'key' => config('services.rajaongkir.api_key')
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        $origins = $result['rajaongkir']['results'];

        $itemCart = Cart::where([
            'user_id' => $id,
            'status' => 0
        ])
            ->join('items', 'carts.item_id', '=', 'items.id')
            ->select('carts.id as cart_id', 'carts.user_id', 'carts.item_id', 'carts.qty', 'carts.status', 'carts.created_at', 'carts.updated_at', 'items.code', 'items.name', 'items.brand', 'items.stock', 'items.price', 'items.image', 'items.description', 'items.weight')
            ->get();


        $totalWeight = 0;
        $total = 0;
        // Calculate subtotals
        foreach ($itemCart as $item) {
            $item->subtotal = $item->qty * $item->price;
            $total += $item->subtotal;
            $totalWeight += $item->weight;
        }
        return view('orders.checkout', compact('itemCart', 'total', 'totalWeight', 'origins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rq = $request->all();

        // Create Customer
        $createCustomer = [
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        $generateIdCustomer = Customer::create($createCustomer);

        $createOrder = [
            'user_id' => $request->user_id,
            'customer_id' => $generateIdCustomer->id,
            'shipping_method' => 'JNE',
            'sub_total' => $request->subtotalCheckout,
            'shipping_cost' => $request->priceShipping,
            'total' => $request->totalCheckout,
            'date' => now(),
            'status_id' => 1,
        ];

        // Handle image upload
        if ($request->hasFile('upload_image_pament')) {
            $image = $request->file('upload_image_pament');
            $imageName = time() . '-' . $request->user_id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/payments'), $imageName);
            // Store the image path in the database
            $createOrder['image_payment'] = 'uploads-images/payments/' . $imageName;
        }

        $generateIdOrder = Order::create($createOrder);

        // Crete Item Product Order
        $resultproduct = array_map(function ($a, $b) {
            return [
                'item_id' => $a,
                'qty' => $b
            ];
        }, $rq['item_id'], $rq['qty']);

        $resultproducts = collect($resultproduct);
        foreach ($resultproducts as $resP) {
            $requestProductOrder = [
                'order_id' => $generateIdOrder->id,
                'item_id' => $resP['item_id'],
                'qty' => $resP['qty']
            ];
            ItemOrder::create($requestProductOrder);
            
            $stock = Item::find($resP['item_id']);
            $stock->stock -= $resP['qty'];
            $stock->save();
            
            Cart::where('item_id', $resP['item_id'])->update(['status' => 1]);
        }
        return redirect()->route('orders.show', $generateIdOrder->id)->with('success', 'Order created  successfully.');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function myorders($id)
    {
        $myorders = Order::where('user_id', $id)->get();
        return view('orders.myorders', compact('myorders'))->with('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $itemOrderProduct = ItemOrder::where('order_id', $order->id)
            ->join('items', 'item_orders.item_id', '=', 'items.id')
            ->select('item_orders.*', 'items.*')
            ->get();
        return view('orders.detailorder', compact('order', 'itemOrderProduct'));
    }

    /**
     * Display the specified resource.
     */
    public function detailOrder(Order $order)
    {
        $itemOrderProduct = ItemOrder::where('order_id', $order->id)
            ->join('items', 'item_orders.item_id', '=', 'items.id')
            ->select('item_orders.*', 'items.*')
            ->get();
        return view('admin.detailorder', compact('order', 'itemOrderProduct'));
    }

    /**
     * Display the specified resource.
     */
    public function confrimOrder($order)
    {
        Order::where('id', $order)->update(['status_id' => 2]);
        $myorders = Order::all();
        return view('admin.orders', compact('myorders'))->with('no');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myorders = Order::all();
        return view('admin.orders', compact('myorders'))->with('no');
    }

    
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $countitem = Item::count();
        $countOrder = Order::count();
        return view('pages.dashboard', compact('countitem','countOrder'));
    }

    public function document(Order $order)
    {
        $itemOrderProduct = ItemOrder::where('order_id', $order->id)
            ->join('items', 'item_orders.item_id', '=', 'items.id')
            ->select('item_orders.*', 'items.*')
            ->get();

        $data = [
            'date' => date('d/m/Y'),
            'order' => $order,
            'itemOrderProduct' => $itemOrderProduct
        ];


        $pdf = PDF::loadView('admin.document', $data);

        return $pdf->download('document.pdf');
    }
}


