<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\account;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {

        $customers = customer::create($request->except('_token', '_method'));
        if ($customers)
            return redirect()->route('customer.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
        else
            return redirect()->route('customer.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, customer $customer)
    {
        $customer->update($request->except('_token', '_method'));
        if ($customer)
            return redirect()->route('customer.index')->with(['success' => 'تم تحديث البيانات بنجاح ']);
        else
            return redirect()->route('customer.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = customer::findOrFail($request->cus_id);
        $customer->delete();
        if ($customer)
            return redirect()->route('customer.index')->with(['success' => 'تم حذف  بيانات الزبون بنجاح ']);
        else
            return redirect()->route('customer.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }
}
