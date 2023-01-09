<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = car::get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $cars = car::create($request->except('_token', '_method'));
        if ($cars)
            return redirect()->route('car.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
        else
            return redirect()->route('car.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, car $car)
    {
        $car->update($request->except('_token', '_method'));
        if ($car)
            return redirect()->route('car.index')->with(['success' => 'تم تحديث البيانات بنجاح ']);
        else
            return redirect()->route('car.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $car = car::findOrFail($request->car_delete_id);
        $contracts = $car->contracts();
            if (isset($contracts) && $contracts->count() > 0) {
                return redirect()->route('car.index')->with(['error' => 'لأ يمكن حذف هذا السيارة لانها مستاجرة  ']);
            }
        $car->delete();
        if ($car)
            return redirect()->route('car.index')->with(['success' => 'تم حذف  بيانات السيارة بنجاح ']);
        else
            return redirect()->route('car.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

    }
}
