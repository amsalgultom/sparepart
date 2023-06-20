<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Item::all();
        $sales = Sale::all();
        return view('sales.index',compact('sales', 'items'))->with('no');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('sales.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_date' => 'required',
            'invoice_no' => 'required',
            'consumer_name' => 'required',
            'item_code' => 'required',
            'qty' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required'
        ]);
  
        Sale::create($request->all());
   
        return redirect()->route('sales.index')->with('success','Sale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        
        $prod = Item::all();
        return view('sales.show',compact('sale','prod'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $sale->update($request->all());
  
        return redirect()->route('sales.index')->with('success','Sales Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
  
        return redirect()->route('sales.index')->with('success','Sales Order deleted successfully');
    }

    public function generatePDF($id)
    {

        $sale = Sale::where('id', $id)->first();
        $item = Item::all();
        $data = [
            'date' => date('m/d/Y'),
            'sale' => $sale,
            'item' => $item
        ];

        $pdf = PDF::loadView('sales.pdf', $data);

        return $pdf->download('sales.pdf');
    }

    public function generateOrder($id)
    {
        $order = Order::where('id', $id)->first();

        $data = [
            'date' => date('m/d/Y'),
            'order' => $order
        ];


        $pdf = PDF::loadView('admin.document', $data);

        return $pdf->download('document.pdf');
    }
}