<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function store_message(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number_phone' => 'required',
            'address' => 'required',
            'time_rent' => 'required',
            'plat_rent' => 'required',
            'product_rent' => 'required',
            'company_id' => 'required',
            'product_id' => 'required',
        ]);


        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'address' => $request->address,
            'time_rent' => $request->time_rent,
            'product_rent' => $request->product_rent,
            'plat_rent' => $request->plat_rent,
            'company_id' => $request->company_id,
            'product_id' => $request->product_id,
        ]);

        return Redirect::back()->with('success', 'Thank you, the company will contact you within 1 x 24 hours');

    }
    public function index_order()
    {
        $messages = auth()->user()->companies->messages;


        return view('index-order', compact('messages'));
    }


    public function delete_order(Message $message)
    {
        $message->delete();
        return Redirect::back()->with('success', 'Deleted successfully');
    }


}