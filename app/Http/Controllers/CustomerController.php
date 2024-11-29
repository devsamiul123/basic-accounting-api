<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customers = Customer::find(1);
        // return $customers->orders()->get();
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->toArray());
        return $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->customer_name = $request->customer_name ? $request->customer_name : $customer->customer_name;
        $customer->mobile_no = $request->mobile_no ? $request->mobile_no : $customer->mobile_no;
        $customer->email = $request->email ? $request->email : $customer->email;
        $customer->address = $request->address ? $request->address : $customer->address;
        $customer->tin_bin_nid = $request->tin_bin_nid ? $request->tin_bin_nid : $customer->tin_bin_nid;
        $customer->tin_bin_nid_type = $request->tin_bin_nid_type ? $request->tin_bin_nid_type : $customer->tin_bin_nid_type;
        $customer->save();
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        return $customer->delete();
    }
}
