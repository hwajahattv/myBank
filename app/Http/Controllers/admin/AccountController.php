<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\MakeTransaction;



class AccountController extends Controller
{
    private $transactionService;

    public function __construct(MakeTransaction $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = DB::table('accounts')->get();
        return view('admin.accounts.allAccounts', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = DB::table('accounts')->find($id);
        return view('admin.accounts.show', ['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function viaEmail(Request $request)
    {
        $acc = DB::table('users')
            ->select('account_number', 'title as Title',)
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['email' => $request['email']])->get();
        if ($acc) {
            return response()->json(['success' => 'Data found.', 'data' => $acc]);
        }
        return response()->json(['error' => 'Wrong email.']);
    }
    public function viaMobile(Request $request)
    {
        $acc = DB::table('users')
            ->select('account_number', 'title as Title',)
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['phone_no' => $request['mobile']])->get();
        if ($acc) {
            return response()->json(['success' => 'Data found.', 'data' => $acc]);
        }
        return response()->json(['error' => 'No record found.']);
    }
    public function viaAccount(Request $request)
    {
        $acc = DB::table('users')
            ->select('account_number', 'title as Title',)
            ->leftJoin('accounts as a', 'a.user_id', '=', 'users.id')
            ->where(['account_number' => $request['account_number']])->get();
        if ($acc) {
            return response()->json(['success' => 'Data found.', 'data' => $acc]);
        }
        return response()->json(['error' => 'No record found.']);
    }
    public function addIndex()
    {
        # code...
        $credit = Account::where(['user_id' => Auth::user()->id])->firstOrFail()->credit;
        return view('frontend.operations.addMoney', ['credit' => $credit]);
    }
    public function addMoney(Request $request)
    {
        # code...
        $request->validate([
            'amount' => ['required', 'integer', 'min:100', 'digits_between: 1,5'],
            'pin' => ['required', 'exists:pins,pin'],

        ], [
            'amount.required' => '*Required',
            'pin.required'   => '*Required',
            'pin.exists:pins,pin' => '*Invalid PIN'
        ]);

        $response = $this->transactionService->make($request, 2);
        if ($response['status'] != 'success') {
            return redirect()->route('client.dashboard')->with('error', 'Error occured!');
        }
        Alert::success('Successfull!', 'Money is added to your account successfully.');

        return redirect()->route('client.dashboard')->with('message', 'Money added to your account successfully!');
    }
}
