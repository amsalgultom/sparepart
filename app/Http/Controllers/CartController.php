<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $itemCart = Cart::where([
            'user_id' => $id,
            'status' => 0
        ])
            ->join('items', 'carts.item_id', '=', 'items.id')
            ->select('carts.id as cart_id', 'carts.user_id', 'carts.item_id', 'carts.qty', 'carts.status', 'carts.created_at', 'carts.updated_at', 'items.code', 'items.name', 'items.brand', 'items.stock', 'items.price', 'items.image', 'items.description', 'items.weight')
            ->get();

        $total = 0;
        // Calculate subtotals
        foreach ($itemCart as $item) {
            $item->subtotal = $item->qty * $item->price;
            $total += $item->subtotal;
        }
        // print_r(json_encode($itemCart));die;
        return view('items.carts', compact('itemCart', 'total'))->with('no');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'qty' => 'required',
        ]);

        Cart::create($request->all());

        return redirect()->route('carts.index', $request->user_id)->with('success', 'item to cart successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $itemDelete = Cart::findOrFail($request->id);
        $itemDelete->delete();
        return redirect()->route('carts.index', $request->user_id)->with('success', 'item to cart successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'update_user_id' => 'required',
            'update_id_cart' => 'required',
            'update_qty' => 'required'
        ]);
    
        $cart = Cart::findOrFail($request->update_id_cart);
        $cart->qty = $request->update_qty;
        $cart->save();

        return redirect()->route('carts.index', $request->update_user_id)->with('success', 'item update cart successfully.');
    }
}
