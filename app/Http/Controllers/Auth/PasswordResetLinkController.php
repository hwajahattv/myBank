<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

use Carbon\Carbon;
use App\Models\User;

use App\Services\SendEmail;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    private $emailService;

    public function __construct(SendEmail $emailService)
    {
        $this->emailService = $emailService;
    }
    public function create(): View
    {
        return view('frontend.forgetPassword');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //     ]);

    //     // We will send the password reset link to this user. Once we have attempted
    //     // to send the link, we will examine the response then see the message we
    //     // need to show to the user. Finally, we'll send out a proper response.
    //     $status = $this->sendResetLink(
    //         $request->only('email')
    //     );
    //     // $status = Password::sendResetLink(
    //     //     $request->only('email')
    //     // );

    //     return $status == Password::RESET_LINK_SENT
    //         ? back()->with('status', __($status))
    //         : back()->withInput($request->only('email'))
    //         ->withErrors(['email' => __($status)]);
    // }
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        FacadesDB::table('password_resets')->where(['email' => $request['email']])->delete();
        FacadesDB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $email_data = array(
            'email' => $request['email'],
            'token' => $token,
        );
        $response = $this->emailService->passwordResetLink($email_data);
        // return $response;
        // Alert::success('Successfull!', 'password reset successfully.');

        // return redirect()->back()->with('message', $email_data);
        return redirect()->back()->with('message', 'We have e-mailed your password reset link!');
    }
}
