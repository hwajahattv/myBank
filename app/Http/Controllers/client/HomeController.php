<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function policy()
    {

        return view('frontend.policy');
    }
    public function notifications($days)
    {
        switch ($days) {
            case 1:
                $start_date = Carbon::today();
                $duration = 'Today';
                break;
            case 7:
                $start_date = now()->subWeek();
                $duration = 'Last 7 Days';
                break;
            case 30:
                $start_date = now()->subMonth();
                $duration = 'Last 30 Days';
                break;
            default:
                return redirect()->back();
        }

        $transactions = DB::table('users')
            ->select('tt.name as Type', 'facc.account_number as UserAccount', 'facc.title as name', 'tt.id as TTID', 't.id as TID', 't.created_at as Date', 't.amount_of_transaction as Amount', 'ac.title as targetTitle', 'ac.account_number as Target', 't.created_at')
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->leftJoin('transactions as t', 'a.id', '=', 't.faccount_id')
            ->leftJoin('accounts as facc', 'facc.id', '=', 't.faccount_id')
            ->leftJoin('accounts as ac', 'ac.id', '=', 't.taccount_id')
            ->leftJoin('transaction_types as tt', 'tt.id', '=', 't.transaction_type_id')
            ->orderBy('t.created_at', 'desc')
            ->whereDate('t.created_at', '>=', $start_date)
            ->where(['users.id' => Auth::user()->id])->get()->toArray();
        $transactions_credited = DB::table('users')
            ->select('tt.name as Type', 'facc.account_number as UserAccount', 'facc.title as name', 'tt.id as TTID', 't.id as TID', 't.created_at as Date', 't.amount_of_transaction as Amount', 'ac.title as targetTitle', 'ac.account_number as Target', 't.created_at')
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->leftJoin('transactions as t', 'a.id', '=', 't.taccount_id')
            ->leftJoin('accounts as facc', 'facc.id', '=', 't.faccount_id')
            ->leftJoin('accounts as ac', 'ac.id', '=', 't.taccount_id')
            ->leftJoin('transaction_types as tt', 'tt.id', '=', 't.transaction_type_id')
            ->orderBy('t.created_at', 'desc')
            ->whereDate('t.created_at', '>=', $start_date)
            ->where(['users.id' => Auth::user()->id])->whereNot(['tt.name' => 'deposits'])->get()->toArray();
        $transactions = array_merge($transactions, $transactions_credited);
        uasort($transactions, function ($a, $b) {
            return strcasecmp($b->created_at, $a->created_at);
        });
        // dd($transactions);
        foreach ($transactions as $transaction) {
            $date = strtotime($transaction->Date);
            $transaction->Date = date('l jS \of F Y h:i:s A', $date);
        }
        // dd($transactions_credited);
        return view('frontend.notifications', ['transactions' => $transactions, 'duration' => $duration]);
    }
    public function portfolio()
    {
        return view('frontend.portfolio');
    }
    public function account()
    {
        $user = DB::table('users as u')
            ->select('u.id as id', 'u.name', 'u.email', 'a.account_number', 'a.status', 'a.type', 'a.credit')
            ->leftJoin('accounts as a', 'u.id', '=', 'a.user_id')->where('u.id', Auth::user()->id)->get();
        // dd($user);
        return view('frontend.account', ['user' => $user[0]]);
    }
    public function reward()
    {
        return view('frontend.reward');
    }
    public function save()
    {
        return view('frontend.save.index');
    }
}
