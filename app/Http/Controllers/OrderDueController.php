<?php

namespace App\Http\Controllers;

use App\Models\OrderDue;
use App\Http\Requests\StoreOrderDueRequest;
use App\Http\Requests\UpdateOrderDueRequest;

class OrderDueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderDue::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDueRequest $request)
    {
        $orderDue = OrderDue::create($request->toArray());
        return $orderDue;
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDue $orderDue)
    {
        return $orderDue;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDueRequest $request, OrderDue $orderDue)
    {
        $orderDue->order_id = $request->order_id ? $request->order_id : $orderDue->order_id;
        $orderDue->paid_amount = $request->paid_amount ? $request->paid_amount : $orderDue->paid_amount;
        $orderDue->due_amount = $request->due_amount ? $request->due_amount : $orderDue->due_amount;
        $orderDue->paid_date = $request->paid_date ? $request->paid_date : $orderDue->paid_date;
        $orderDue->save();
        return $orderDue;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDue $orderDue)
    {
        return $orderDue->delete();
    }
}
