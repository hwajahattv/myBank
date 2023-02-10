<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class RequestController extends Controller
{
    public function index()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return view('frontend.operations.requestMoney', ['credit' => $credit]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'amount' => 'required|integer|min:100|digits_between: 1,6',
            'email' => 'required|exists:users,email',
        ], [
            'email.required' => '*Required',
            'amount.required' => '*Required',
        ]);
        $originatorEmail = Auth::user()->email;
        $originator = DB::table('users')->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['email' => $originatorEmail])->get();
        $receiver = DB::table('users')->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['email' => $request['email']])->get();
        // dd($receiver);
        DB::table('requests')->insert([
            'originator_email' => $originatorEmail,
            'originator_account_number' => $originator[0]->account_number,
            'amount' => $request['amount'],
            'receiver_email' => $request['email'],
            'receiver_account_number' => $receiver[0]->account_number,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // $faccount = Account::where(['account_number' => $user[0]->account_number])->first();
        // dd($status);
        // dd($status);
        // $data = ['taccount' => $taccount->id, 'faccount' => $faccount->id, 'amount' => $request['amount']];
        // $response = $this->transactionService->make($data, 4);

        Alert::success('Successfull!', 'Request made successfully.');
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return redirect()->route('client.dashboard')->with(['credit' => $credit, 'message' => 'Money request sent successfully!']);
    }
    public function received()
    {
        $requests = DB::table('requests')->where(['receiver_email' => Auth::user()->email, 'status' => 'pending'])->get();
        return view('frontend.operations.requestsList', ['requests' => $requests]);
    }
    public function show($id)
    {
        $request = DB::table('requests')->where(['id' => $id, 'status' => 'pending'])->first();
        // dd($request);
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;

        return view('frontend.operations.request', ['credit' => $credit, 'request' => $request]);
    }
}
