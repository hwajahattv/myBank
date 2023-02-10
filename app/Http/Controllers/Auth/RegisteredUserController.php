<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\SendEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;



class RegisteredUserController extends Controller
{

    private $emailService;

    public function __construct(SendEmail $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'phone_no' => ['required', 'integer', 'digits_between: 1,15', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'name.required' => '*Required',
                'email.required' => '*Required',
                'phone_no.required' => '*Required',
                'password.required' => '*Required',
                'password.required' => '*Required',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);
        // dd($user);
        // New account creation
        $lastopenedAccount = Account::orderBy('id', 'desc')->first();
        $newAccountNumber = $lastopenedAccount->account_number + 1;

        $acc = Account::create([
            'account_number' => $newAccountNumber,
            'title' => $user->name,
            'date_opened' => now(),
            'user_id' => $user->id,
            'status' => 'open',
            'type' => 'basic',
        ]);
        //////////////////////////////////////////////
        // Email sending
        //////////////////////////////////////////////

        // client email data
        $email_data = array(
            'name' => $user->name,
            'email' => $user->email,
            'account_number' => $acc->account_number,
            'title' => $acc->title,
            'admin_email_address' => 'amir@stallionecom.co.uk',
            'subject' => 'Welcome to MyBank',
            'body' => 'Welcome to myBank',
        );


        // // send email to client 
        // Mail::send('admin.emails.register_client', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'], $email_data['name'], $email_data['account_number'], $email_data['title'])
        //         ->subject('Welcome to MyBank')
        //         ->from('info@myBank.com', 'MyBank Admin');
        // });
        // // send email to admin

        // Mail::send('admin.emails.account_created_admin', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['admin_email_address'], $email_data['name'], $email_data['account_number'], $email_data['title'])
        //         ->subject('New Account Created.')
        //         ->from('info@myBank.com', 'MyBank Admin');
        // });
        $response = $this->emailService->sendBasicEmail($email_data);
        // $adminEmailEesponse = $this->emailService->notifyAdminNewAccount($email_data);
        // if (!$response['status']) {
        //     return back()->with("failed", "Email not sent.");
        // } else if ($response['status'] == 'exception') {
        //     return back()->with("failed", "Email not sent.");
        // } else {
        //     Alert::success('Successfull!', 'Your account is opened successfully.');

        //     return redirect('/client/dashboard');
        // }
        Alert::success('Successfull!', 'Your account is opened successfully.');


        //return redirect(RouteServiceProvider::HOME);
        return redirect()->route('client.login')->with('message', 'User account created successfully!');;
    }
    // public function composeEmail($email_data)
    // {

    //     $mail = new PHPMailer(true);     // Passing `true` enables exceptions

    //     try {

    //         // Email server settings
    //         $mail->SMTPDebug = 0;
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';             //  smtp host
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'laravel.application105@gmail.com';   //  sender username
    //         $mail->Password = 'jrpzixwoyxxpvajr';       // sender password
    //         $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
    //         $mail->Port = 587;                          // port - 587/465

    //         $mail->setFrom('laravel.application105@gmail.com', 'MyBank Team');
    //         $mail->addAddress($email_data['email']);
    //         // $mail->addCC($request->emailCc);
    //         // $mail->addBCC($request->emailBcc);

    //         // $mail->addReplyTo('laravel.application105@gmail.com', 'MyBank Team');

    //         if (isset($_FILES['emailAttachments'])) {
    //             for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
    //                 $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
    //             }
    //         }


    //         $mail->isHTML(true);                // Set email content format to HTML

    //         $mail->Subject = $email_data['subject'];
    //         $mail->Body    = $email_data['body'];

    //         // $mail->AltBody = plain text version of email body;

    //         if (!$mail->send()) {
    //             return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
    //         } else {
    //             return back()->with("success", "Email has been sent.");
    //         }
    //     } catch (Exception $e) {
    //         return back()->with('error', 'Message could not be sent.');
    //     }
    // }
}
