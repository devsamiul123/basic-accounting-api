<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Withdraw::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWithdrawRequest $request)
    {
        $withdraw = Withdraw::create($request->toArray());
        return $withdraw;
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdraw $withdraw)
    {
        return $withdraw;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWithdrawRequest $request, Withdraw $withdraw)
    {
        $withdraw->withdraw_amount = $request->withdraw_amount ? $request->withdraw_amount : $withdraw->withdraw_amount;
        $withdraw->withdraw_date = $request->withdraw_date ? $request->withdraw_date : $withdraw->withdraw_date;
        $withdraw->save();
        return $withdraw;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Withdraw $withdraw)
    {
        return $withdraw->delete();
    }
}
