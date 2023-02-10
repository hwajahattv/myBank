<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Bill;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\MakeTransaction;

use RealRashid\SweetAlert\Facades\Alert;

class UtilityPayController extends Controller
{
    private $transactionService;
    public function __construct(MakeTransaction $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    public function index()
    {
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        $utilities = Utility::pluck('name', 'id');
        // dd($utilities);
        return view('frontend.operations.utility.index', ['credit' => $credit, 'utilities' => $utilities]);
    }
    public function getData(Request $request)
    {
        $bill = Bill::where(['utility_id' => $request['utility_id'], 'consumer_number' => $request['consumer_number']])->firstOrFail();

        if ($bill) {
            return response()->json(['success' => 'Data found.', 'data' => $bill]);
        }
        return response()->json(['error' => 'Wrong email.']);
    }
    public function makePayment(Request $request)
    {
        // dd($request);
        $request->validate([
            'amount' => 'required',
            'consumer_number' => 'required|exists:bills,consumer_number',
            'utility_id' => 'required|exists:utilities,id',
            'pin' => 'required|exists:pins,pin',
        ], [
            'pin.required' => '*Required',
            'pin.exists:pins,pin' => '*Pin invalid',
        ]);

        $data = ['consumer_number' => $request['consumer_number'], 'amount' => $request['amount'], 'utility_id' => $request['utility_id']];
        $response = $this->transactionService->make($data, 5);
        if ($response['status'] == 'failed') {
            Alert::success('Failed!', $response['message']);
            $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
            return redirect()->route('client.dashboard')->with(['credit' => $credit, 'error' => $response['message']]);
        }
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return redirect()->route('client.dashboard')->with(['credit' => $credit, 'message' => 'Utility Bill paid successfully.']);
    }
}
