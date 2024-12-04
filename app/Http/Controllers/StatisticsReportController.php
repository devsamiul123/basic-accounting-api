<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class StatisticsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalOrder = Order::all()->count();
        $totalRevenue = Order::all()->sum('total_price');
        $totalPayment = Payment::all()->sum('paid_amount');
        $totalDues = $totalRevenue - $totalPayment;
        $totalExpense = Expense::all()->sum('paid_amount');
        $totalWithdraw = Withdraw::all()->sum('withdraw_amount');
        $totalCashInHand = $totalPayment - $totalExpense - $totalWithdraw;

        $statistics = array(
            'totalOrder' => $totalOrder,
            'totalRevenue' => $totalRevenue,
            'totalPayment' => $totalPayment,
            'totalDues' => $totalRevenue - $totalPayment,
            'totalExpense' => $totalExpense,
            'totalWithdraw' => $totalWithdraw,
            'totalCashInHand' => $totalPayment - $totalExpense - $totalWithdraw
        );

        return $statistics;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
