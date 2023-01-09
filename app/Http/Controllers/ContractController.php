<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\bank;
use App\Models\car;
use App\Models\contract;
use App\Models\customer;
use App\Models\driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['customers'] = customer::get();
        $data['cars'] = car::all();
        $data['users'] = User::get();
        $data['banks'] = bank::all();
        $data['contracts'] = contract::get();
        return view('contracts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['customers'] = customer::get();
        $data['cars'] = car::all();
        $data['users'] = User::get();
        $data['banks'] = bank::all();
        $data['drivers'] = driver::all();

        return view('contracts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $contract = contract::create([
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'bank_id' => $request->bank_id,
            'cus_id' => $request->cus_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'state' => $request->state,
            'details' => $request->details,
            'driver_id' => $request->driver_id,
            'account_number'=>$request->account_number,
            'secret_code'=>$request->secret_code,
        ]);
        if ($contract)
            return redirect()->route('contract.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
        else
            return redirect()->route('contract.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(contract $contract)
    {

        return view('contracts.show', compact(['contract']));

        // return view('contracts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(contract $contract)
    {
        $customers = customer::get();
        $cars = car::all();
        $users = User::get();
        $banks = bank::all();
        $drivers = driver::all();

        return view('contracts.edit', compact(['contract', 'customers', 'cars', 'users', 'banks','drivers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, contract $contract)
    {
        $contract->update([
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'bank_id' => $request->bank_id,
            'cus_id' => $request->cus_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'state' => $request->state,
            'details' => $request->details,
            'driver_id' => $request->driver_id,
            'account_number'=>$request->account_number,
            'secret_code'=>$request->secret_code,
        ]);
        if ($contract)
            return redirect()->route('contract.index')->with(['success' => 'تم تحديث البيانات بنجاح ']);
        else
            return redirect()->route('contract.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contract = contract::findOrFail($request->contract_id);
        $contract->delete();
        if ($contract)
            return redirect()->route('contract.index')->with(['success' => 'تم حذف  بيانات العقد بنجاح ']);
        else
            return redirect()->route('contract.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }
    public function findCarDetails(Request $request)
    {
        $c = car::all()->where('id', $request->id)->first();
        return response()->json($c);
    }
    public function print($id)
    {
        $contracts = contract::findOrFail($id);
        return view('contracts.print', compact('contracts'));

    }
}
