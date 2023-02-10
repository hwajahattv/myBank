<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transactions= DB::table('transactions')
        $transactions = DB::table('transactions')
            ->select('transactions.id', 'transactions.date_of_transaction as date', 'transactions.amount_of_transaction', 'transaction_types.name', 'ta.title as ToAccountTitle', 'ta.account_number as ToAccountNumber', 'tf.title as FromAccountTitle', 'tf.account_number as FromAccountNumber')
            ->join('transaction_types', 'transactions.transaction_type_id', '=', 'transaction_types.id')
            ->join('accounts as ta', 'transactions.taccount_id', '=', 'ta.id')
            ->join('accounts as tf', 'transactions.faccount_id', '=', 'tf.id')
            ->get();
        // dd($transactions);
        return view('admin.transactions.allTransactions', ['transactions' => $transactions]);
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
        $transaction = DB::table('transactions')
            ->select('transactions.id', 'transactions.date_of_transaction as date', 'transactions.amount_of_transaction', 'transaction_types.name', 'ta.title as ToAccountTitle', 'ta.account_number as ToAccountNumber', 'tf.title as FromAccountTitle', 'tf.account_number as FromAccountNumber')
            ->join('transaction_types', 'transactions.transaction_type_id', '=', 'transaction_types.id')
            ->join('accounts as ta', 'transactions.taccount_id', '=', 'ta.id')
            ->join('accounts as tf', 'transactions.faccount_id', '=', 'tf.id')
            ->where('transactions.id', $id)->get();
        // dd($transaction);
        return view('admin.transactions.show', ['transaction' => $transaction]);
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
    public function find(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id'
        ]);
        $transaction = DB::table('transactions')
            ->select('transactions.id', 'transactions.date_of_transaction as date', 'transactions.amount_of_transaction', 'transaction_types.name', 'ta.title as ToAccountTitle', 'ta.account_number as ToAccountNumber', 'tf.title as FromAccountTitle', 'tf.account_number as FromAccountNumber')
            ->join('transaction_types', 'transactions.transaction_type_id', '=', 'transaction_types.id')
            ->join('accounts as ta', 'transactions.taccount_id', '=', 'ta.id')
            ->join('accounts as tf', 'transactions.faccount_id', '=', 'tf.id')
            ->where('transactions.id', $request['transaction_id'])->get();
        // dd($transaction);
        if (empty($transaction)) {
            Alert::success('Successfull!', 'You are logged in successfully.');
            dd('test');
        }

        return view('admin.transactions.show', ['transaction' => $transaction]);
    }
}
