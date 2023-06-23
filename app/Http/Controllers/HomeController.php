<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $items = Item::orderBy('id', 'desc')->paginate('6') ;
        return view('pages.home', compact('items'));
    }
}
