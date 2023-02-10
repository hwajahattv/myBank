<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Services\MakeTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SendMoneyController extends Controller
{
    private $transactionService;

    public function __construct(MakeTransaction $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    public function index()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return view('frontend.operations.sendingOptions', ['credit' => $credit]);
    }

    public function viaEmail()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return view('frontend.operations.sendViaEmail', ['credit' => $credit]);
    }
    public function viaMobile()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return view('frontend.operations.sendViaMobile', ['credit' => $credit]);
    }
    public function viaAccount()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return view('frontend.operations.sendViaAccount', ['credit' => $credit]);
    }
    public function pay(Request $request)
    {

        $request->validate([
            'amount' => 'required',
            //            'surName' => 'required|max:25',
            'email' => 'required',
            'pin' => 'required|exists:pins,pin',
        ], [
            'pin.required' => '*Required',
            'pin.exists:pins,pin' => '*Pin invalid',
        ]);

        $userEmail = Auth::user()->email;
        $user = DB::table('users')
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['email' => $userEmail])->get();
        // dd($user);
        $faccount = Account::where(['account_number' => $user[0]->account_number])->first();
        // dd($status);
        $targetEmail = $request['email'];
        $targetUser = DB::table('users')
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['email' => $targetEmail])->get();
        $taccount = Account::where(['account_number' => $targetUser[0]->account_number])->first();
        // dd($status);
        $data = ['taccount' => $taccount->id, 'faccount' => $faccount->id, 'amount' => $request['amount']];
        $response = $this->transactionService->make($data, 3);
        if ($response['status'] == 'failed') {
            Alert::success('Failed!', $response['message']);
            $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
            return redirect()->route('client.dashboard')->with(['credit' => $credit, 'error' => $response['message']]);
        }
        Alert::success('Successfull!', 'Money transferred successfully.');

        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return redirect()->route('client.dashboard')->with(['credit' => $credit, 'message' => 'Money transferred successfully.']);
    }
    public function payMobile(Request $request)
    {

        $request->validate([
            'amount' => 'required',
            //            'surName' => 'required|max:25',
            'phone_no' => 'required|integer|digits_between: 1,15',
            'pin' => 'required|exists:pins,pin',
        ], [
            'pin.required' => '*Required',
            'pin.exists:pins,pin' => '*Pin invalid',
        ]);

        $user = DB::table('users')->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['users.id' => Auth::user()->id])->get();
        // dd($user);
        $faccount = Account::where(['account_number' => $user[0]->account_number])->first();
        // dd($status);
        $targetMobile = $request['phone_no'];
        $targetUser = DB::table('users')
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['phone_no' => $targetMobile])->get();
        $taccount = Account::where(['account_number' => $targetUser[0]->account_number])->first();
        // dd($status);
        $data = ['taccount' => $taccount->id, 'faccount' => $faccount->id, 'amount' => $request['amount']];
        $response = $this->transactionService->make($data, 3);
        if ($response['status'] == 'failed') {
            Alert::success('Failed!', $response['message']);
            $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
            return redirect()->route('client.dashboard')->with(['credit' => $credit, 'error' => $response['message']]);
        }
        Alert::success('Successfull!', 'Money transferred successfully.');

        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return redirect()->route('client.dashboard')->with(['credit' => $credit, 'message' => 'Money transferred successfully.']);
    }
    public function payAccount(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            //            'surName' => 'required|max:25',
            'account_number' => 'required|integer|digits_between: 1,15',
            'pin' => 'required|exists:pins,pin',
        ], [
            'pin.required' => '*Required',
            'pin.exists:pins,pin' => '*Pin invalid',
        ]);

        $user = DB::table('users')->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['users.id' => Auth::user()->id])->get();
        // dd($user);
        $faccount = Account::where(['account_number' => $user[0]->account_number])->first();
        // dd($status);
        $targetAccount = $request['account_number'];
        $targetUser = DB::table('users')
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['account_number' => $targetAccount])->get();
        $taccount = Account::where(['account_number' => $targetUser[0]->account_number])->first();
        // dd($status);
        $data = ['taccount' => $taccount->id, 'faccount' => $faccount->id, 'amount' => $request['amount']];
        $response = $this->transactionService->make($data, 3);
        if ($response['status'] == 'failed') {
            Alert::success('Failed!', $response['message']);
            $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
            return redirect()->route('client.dashboard')->with(['credit' => $credit, 'error' => $response['message']]);
        }
        Alert::success('Successfull!', 'Money transferred successfully.');

        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return redirect()->route('client.dashboard')->with(['credit' => $credit, 'message' => 'Money transferred successfully.']);
    }
}
