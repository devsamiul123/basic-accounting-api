<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderDetail::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDetailRequest $request)
    {
        $orderDetail = OrderDetail::create($request->toArray());
        return $orderDetail;
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        return $orderDetail;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        $orderDetail->order_id = $request->order_id ? $request->order_id : $orderDetail->order_id;
        $orderDetail->product_id = $request->product_id ? $request->product_id : $orderDetail->product_id;
        $orderDetail->qty = $request->qty ? $request->qty : $orderDetail->qty;
        $orderDetail->unit_in_number = $request->unit_in_number ? $request->unit_in_number : $orderDetail->unit_in_number;
        $orderDetail->unit_in_string = $request->unit_in_string ? $request->unit_in_string : $orderDetail->unit_in_string;
        $orderDetail->item_price = $request->item_price ? $request->item_price : $orderDetail->item_price;
        $orderDetail->save();
        return $orderDetail;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        return $orderDetail->delete();
    }
}
