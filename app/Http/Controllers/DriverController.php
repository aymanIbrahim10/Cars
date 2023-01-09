<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Models\car;
use App\Models\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = driver::get();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {

        $drivers = driver::create($request->except('_token', '_method'));
        if ($drivers)
            return redirect()->route('driver.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
        else
            return redirect()->route('driver.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {

        return view('drivers.show', compact('driver'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        // $cars = car::get();
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(driverRequest $request, driver $driver)
    {
        $driver->update($request->except('_token', '_method'));
        if ($driver)
            return redirect()->route('driver.index')->with(['success' => 'تم تحديث البيانات بنجاح ']);
        else
            return redirect()->route('driver.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $driver = driver::findOrFail($request->driver_id);
        $driver->delete();
        if ($driver)
            return redirect()->route('driver.index')->with(['success' => 'تم حذف  بيانات السائق بنجاح ']);
        else
            return redirect()->route('driver.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }
}
