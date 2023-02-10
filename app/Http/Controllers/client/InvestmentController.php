<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvestmentController extends Controller
{
    public function index()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        $investment_plans = DB::table('investments as i')
            ->select('i.name as plan_name', 'company', 'it.name as type', 'return_cycle', 'return_rate', 'amount', 'i.id')
            ->leftJoin('investment_types as it', 'i.investment_type_id', '=', 'it.id')
            ->get();
        $investment_types = DB::table('investment_types')->get();
        return view('frontend.investments.index', ['credit' => $credit, 'investments' => $investment_plans, 'types' => $investment_types]);
    }
    public function show($id)
    {
        $investment = DB::table('investments as i')
            ->select('i.name as name', 'it.name as type', 'company', 'return_rate', 'return_cycle', 'amount')
            ->leftJoin('investment_types as it', 'it.id', '=', 'i.investment_type_id')
            ->where(['i.id' => $id])->first();
        // dd($investment);
        if (!$investment) {
            return abort(404);
        }
        return view('frontend.investments.show', ['investment' => $investment]);
    }
}
