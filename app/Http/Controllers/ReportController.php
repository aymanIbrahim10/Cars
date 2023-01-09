<?php

namespace App\Http\Controllers;

use App\Models\bank;
use App\Models\car;
use App\Models\contract;
use App\Models\customer;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ContractSearch(Request $request)
    {

                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $contracts = contract::whereBetween('start_date', [$start_at, $end_at])->get();
                return view('contracts.index', compact( 'start_at', 'end_at','contracts'))->withDetails($contracts);

    }
}
