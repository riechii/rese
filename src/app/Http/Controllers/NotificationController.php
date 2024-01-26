<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class NotificationController extends Controller
{
    //お知らせメール送信フォーム
    public function showNotificationEmail()
    {
        $users = User::all();

        return view('emails.notification_form',compact('users'));
    }


    //お知らせメールの送信
    public function sendNotificationEmail(Request $request)
    {
        $userEmails = $request->input('user_emails');
        $content = $request->input('content');

        foreach ($userEmails as $userEmail) {
            Mail::to($userEmail)->send(new NotificationMail($content));
        }

        return redirect('/upload/form')->with('message', 'メールを送信しました');
    }
}
