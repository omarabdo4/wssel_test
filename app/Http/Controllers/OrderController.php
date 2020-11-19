<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shoptype;
use Illuminate\Http\Request;
use App\Mail\CustomerDetailsMail;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index',[
            'orders' => Order::with('shoptype')->get()
        ]);
    }

    public function send(Request $request, $id)
    {
        $order = Order::with('customer')->findOrFail($id);

        Mail::to('it@wssel.com')->send(new CustomerDetailsMail($order->customer));
        
        return back()->with('status', 'Message Sent Successfully!');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit',[
            'order' => $order,
            'shoptypes' => Shoptype::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->shoptype_id = $request->shoptype;
        $order->amount = $request->amount;
        $order->save();
        return back()->with('status', 'Order Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('status', 'Order Deleted Successfully!');
    }
}
