<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Services\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PinController extends Controller
{
    private $emailService;

    public function __construct(SendEmail $emailService)
    {
        $this->emailService = $emailService;
    }

    public function create()
    {
        $randomNumber = random_int(100000, 999999);

        // client email data
        $email_data = array(
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'pin' => $randomNumber,
        );


        // send OTP email to client 
        // Mail::send('admin.emails.otp', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'], $email_data['name'], $email_data['pin'])
        //         ->subject('Welcome to MyBank')
        //         ->from('info@myBank.com', 'MyBank Admin');
        // });
        // check if pin already created against this person
        $pin = Pin::where(['user_id' => Auth::user()->id])->first();
        if ($pin != null) {
            $pin->delete();
        }
        // save OTP in db table

        $otp = new Pin();
        $otp->user_id = Auth::user()->id;
        $otp->pin = $randomNumber;
        $otp->save();

        $email_data = array(
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'pin' => $randomNumber,
        );
        $response = $this->emailService->sendPin($email_data);

        return response()->json(['success' => 'Pin sent to your email.', 'otp' => $randomNumber]);
    }
}
