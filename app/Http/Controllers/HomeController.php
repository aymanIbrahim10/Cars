<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\contract;
use App\Models\customer;
use App\Models\driver;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $data =[];
        $data['customers'] = customer::get();
        $data['cars'] = car::get() ;
        $data['contracts'] = contract::get();
        $data['drivers'] = driver::get();
        return view('dashboard',$data);
    }

}
