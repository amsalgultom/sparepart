<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; // Tambahkan impor ini

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index',compact('items'))->with('no');
    }

    /**
     * Display a listing of the resource.
     */
    public function allItem()
    {
        $items = Item::all();
        return view('pages.items',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    public function getItem()
    {
        $items = Item::all();
        return DataTables::of($items)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'weight' => 'required',
            'price' => 'required'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->code .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/items'), $imageName);
            // You can also store the image path in the database if needed
        }
  
        Item::create($request->except('image') + ['image' => $imageName ?? null]);
   
        return redirect()->route('items.index')->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    /**
     * Display the specified resource.
     */
    public function itemDetails(Item $item)
    {
        return view('items.itemdetails',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_code' => 'required',
            'item_name' => 'required',
            'unit' => 'required',
            'category' => 'required',
            'selling_price' => 'required',
            'purchase_price' => 'required'
        ]);
  
        $item->update($request->all());
  
        return redirect()->route('items.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
  
        return redirect()->route('items.index')->with('success','Item deleted successfully');
    }
}
