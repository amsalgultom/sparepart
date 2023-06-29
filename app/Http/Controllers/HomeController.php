<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->paginate('6') ;
        return view('pages.home', compact('items'));
    }

    public function myaccount(User $user)
    {
        return view('pages.myaccount', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|confirmed'
        ]); 
    
        $user->update($request->all());

        return redirect()->route('user.myaccount', $user->id)->with('success', 'User update successfully.');
    }
    
}
