<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail()
    {
        SendMail::dispatch()->delay(now()->addSecond(2));
        $to_name = "Thuc Nguyen";
        $to_email = "thuc9a85@gmail.com";
        // $link_reset_pass = url('update-new-pass?email=' . $to_email . '&token=' . $rand_id);
        $data = array("name" => "Mail từ tài khoản khách hàng", "body" => "Mail gửi về vấn đề hàng hóa"); // body of mail.blade.php
        Mail::send('emails.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Thư gửi từ H-Cinderella');
            $message->from($to_email, $to_name); //send from this mail
        });
        return redirect('/')->with('message', '');
    }
}
