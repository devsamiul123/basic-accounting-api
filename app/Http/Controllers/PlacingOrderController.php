<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class PlacingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOrders = Order::get();
        $odr = array();
        foreach ($allOrders as $orders){
            $orderDetails = $orders->orderDetails()->get();
            $orders['child'] = $orderDetails;
            $odr[] = $orders;
        }
        return $odr;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderDetails = $request->child;
        $request = $request->toArray();
        unset($request['child']);

        // insert data
        $order = Order::create($request);
        $order->orderDetails()->createMany($orderDetails);

        // get data
        $odr = Order::find($order->id);
        $ord_details = $odr->orderDetails()->get();
        $ord['child'] = $ord_details;
        return $odr;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        $orderDetails = $order->orderDetails()->get();
        $order['child'] = $orderDetails;
        return $order;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $orderDetails = $order->orderDetails()->get();

        $totalPrice = 0;
        $itemPrice = 0;
        $ipr = array();

        foreach($orderDetails as $orderDetail){
            $product = Product::find($orderDetail->product_id);
            $productUnitPrice = $product->unit_price;
            $itemPrice = $orderDetail->qty * $orderDetail->unit_in_number * $productUnitPrice;
            $totalPrice += $itemPrice;
            $ipr[] = $itemPrice;
            $orderDetail->item_price = $itemPrice;
            $orderDetail->save();
        }
        $ipr['tp'] = $totalPrice;
        $order->total_price = $totalPrice;
        $order->save();

        $updatedOrder = $this->show($id);
        $ipr['updatedOrder'] = $updatedOrder;
        return $ipr;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        return $order->delete();
    }
}
