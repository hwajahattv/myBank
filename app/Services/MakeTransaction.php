<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;


class MakeTransaction
{

    public function make($request, $type)
    {

        if ($type == 5) // in the case of utility payment
        {
            $facc = Account::where(['user_id' => Auth::user()->id])->first();
            $facc->credit += $request['amount'];
            Account::where(['user_id' => Auth::user()->id])->update(['credit' => $facc->credit]);
            $trans = new Transaction();
            $trans->amount_of_transaction = $request['amount'];
            $trans->transaction_type_id = $type;
            $trans->date_of_transaction = now();
            $trans->utility_id = $request['utility_id'];
            $trans->consumer_number = $request['consumer_number'];
            $trans->faccount_id = $facc->id;
            $trans->save();
        } else {
            if ($type == 2) {
                $tacc = Account::where(['user_id' => Auth::user()->id])->first();
                $tacc->credit += $request['amount'];
                Account::where(['user_id' => Auth::user()->id])->update(['credit' => $tacc->credit]);
                $facc = $tacc;
            } else {
                $facc = Account::where(['user_id' => Auth::user()->id])->first();
                if ($request['amount'] > $facc->credit) {
                    return $msg = ['status' => 'failed', 'message' => 'Not enough funds.'];
                } else {
                    $facc->credit -= $request['amount'];
                    Account::where(['id' => $facc->id])->update(['credit' => $facc->credit]);
                    $tacc = Account::where(['id' => $request['taccount']])->first();
                    $tacc->credit += $request['amount'];
                    Account::where(['id' => $request['taccount']])->update(['credit' => $tacc->credit]);
                }
            }
            $trans = new Transaction();
            $trans->amount_of_transaction = $request['amount'];
            $trans->transaction_type_id = $type;
            $trans->date_of_transaction = now();
            $trans->taccount_id = $tacc->id;
            $trans->faccount_id = $facc->id;
            $trans->save();
        }
        return $msg = ['status' => 'success', 'message' => 'Made transaction.'];
    }
}
