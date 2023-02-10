<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendEmail
{

    public function send($email_data)
    {

        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'laravel.application105@gmail.com';   //  sender username
            $mail->Password = 'jrpzixwoyxxpvajr';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('laravel.application105@gmail.com', 'MyBank Team');
            $mail->addAddress($email_data['email']);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            // $mail->addReplyTo('laravel.application105@gmail.com', 'MyBank Team');

            if (isset($_FILES['emailAttachments'])) {
                for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $email_data['subject'];
            $mail->Body    = $email_data['body'];

            // $mail->AltBody = plain text version of email body;

            return ['status' => $mail->send(), 'mail_data' => $mail];
        } catch (Exception $e) {
            return
                ['status' => 'exception', 'message' => $e->getMessage()];
        }
    }
    public function notifyAdminNewAccount($email_data)
    {

        try {
            $to = 'amir@stallionecom.co.uk';
            $subject = "New User Account created.";

            $message =
                "
<html>
<head>
<title>Email</title>
</head>
<body>
Hello Admin,<br><br>


New user is registered and his/her account is opened successfully. The account credentials are:<br>
Full name: " . $email_data['name'] . "<br>
Email: " . $email_data['email'] . "<br>
Account number: " . $email_data['account_number'] . "<br>
Account Title: " . $email_data['title'] . "<br>
<br>

Thank You,<br>
MyBank Team.

</body>
</html>
";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <no-reply@MyBank.com>' . "\r\n";
            $headers .= 'Cc: rehmanafridi2003@gmailcom' . "\r\n";

            mail(
                $to,
                $subject,
                $message,
                $headers
            );

            // $mail->AltBody = plain text version of email body;

            return ['status' => 'success'];
        } catch (Exception $e) {
            return
                ['status' => 'exception'];
        }
    }
    public function sendBasicEmail($email_data)
    {

        try {
            $to = $email_data['email'];
            $subject = "Welcome to MyBank";

            $message =
                "
<html>
<head>
<title>Email</title>
</head>
<body>
Hello  " . $email_data['name'] . ",<br><br>

Welcome to MyBank.<br><br>
You account is opened successfully. Your account credentials are:<br>

Account number: " . $email_data['account_number'] . "<br>

Account Title: " . $email_data['title'] . "<br>
<br>

Thank You,<br>
MyBank Team.

</body>
</html>
";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <no-reply@MyBank.com>' . "\r\n";
            $headers .= 'Cc: rehmanafridi2003@gmailcom' . "\r\n";

            mail(
                $to,
                $subject,
                $message,
                $headers
            );

            // $mail->AltBody = plain text version of email body;

            return ['status' => 'success'];
        } catch (Exception $e) {
            return
                ['status' => 'exception'];
        }
    }
    public function sendPin($email_data)
    {

        try {
            $to = $email_data['email'];
            $subject = "One Time Password";
            $message =
                "
<html>
<head>
<title>Email</title>
</head>
<body>

Dear " . $email_data['name'] . ",<br>

Your One Time Password (OTP) for the internet transaction through your MyBank Account is " . $email_data['pin'] . ". This OTP is Valid for next 10 minutes.<br>

<br>
<br>

Please call our MyBank helpline at +745845225522151 , if you have not initiated an online transaction.<br>
<br>
<br>


Yours sincerely<br>

MyBank Team<br>


This email and any attachments are confidential and may also be privileged. If you are not the intended recipient, please delete all copies and notify the sender immediately.

<br>
<br>

Thank You,<br>
MyBank Team.

</body>
</html>
";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <no-reply@MyBank.com>' . "\r\n";

            mail(
                $to,
                $subject,
                $message,
                $headers
            );

            // $mail->AltBody = plain text version of email body;

            return ['status' => 'success'];
        } catch (Exception $e) {
            return
                ['status' => 'exception'];
        }
    }
    public function passwordResetLink($email_data)
    {
        try {
            $to = $email_data['email'];
            $subject = "Password Reset";
            $message =
                "
<html>
<head>
<title>Email</title>
</head>
<body>

<h1>Forget Password Email</h1>
   
<span>You can reset password from bellow link:</span>
<a href=\"amazon-consultant.co.uk/banking/reset/password/" . $email_data['token'] . ">Reset Password</a>
<br>
<br>

Thank You,<br>
MyBank Team.

</body>
</html>
";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <no-reply@MyBank.com>' . "\r\n";

            mail(
                $to,
                $subject,
                $message,
                $headers
            );

            // $mail->AltBody = plain text version of email body;

            return ['status' => 'success'];
        } catch (Exception $e) {
            return
                ['status' => 'exception'];
        }
    }
}
