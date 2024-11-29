<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Payment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->toArray());
        return $payment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return $payment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->order_id = $request->order_id ? $request->order_id : $payment->order_id;
        $payment->paid_amount = $request->paid_amount ? $request->paid_amount : $payment->paid_amount;
        $payment->payment_type = $request->payment_type ? $request->payment_type : $payment->payment_type;
        $payment->payment_account = $request->payment_account ? $request->payment_account : $payment->payment_account;
        $payment->paid_date = $request->paid_date ? $request->paid_date : $payment->paid_date;
        $payment->save();
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        return $payment->delete();
    }
}
