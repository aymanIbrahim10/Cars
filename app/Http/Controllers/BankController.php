<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = bank::get();
        return view('banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $banks = new bank;
        $banks -> bank_name = $request -> bank_name;
        $banks -> payment_method = json_encode($request -> payment_method);
        $banks->save();
        if ($banks)
            return redirect()->route('bank.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
        else
            return redirect()->route('bank.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, bank $bank)
    {
        $bank->update($request->except('_token', '_method'));
        if ($bank)
            return redirect()->route('bank.index')->with(['success' => 'تم تحديث البيانات بنجاح ']);
        else
            return redirect()->route('bank.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bank = bank::findOrFail($request->bank_id);
        $bank->delete();
        if ($bank)
            return redirect()->route('bank.index')->with(['success' => 'تم حذف  بيانات البنك بنجاح ']);
        else
            return redirect()->route('bank.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

    }
}
