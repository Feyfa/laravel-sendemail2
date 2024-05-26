<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index()
    {
        return response()->view('welcome');
        // $to = "muhammadjidan703@gmail.com";
        // $subject = "Pesan Serius";
        // $details = [
        //     'title' => 'Mail From Fisika Modern',
        //     'body' => '<h1>Selamat Malam, Saya Dari Kepolisian</h1>',
        // ];
        // $template = "emails.demoMail";

        // Mail::to($to)->send(new DemoMail($subject, $details, $template));

        // dd('Email Send Successfully');
    }

    public function sendEmail(Request $request) 
    {
        $request->validate([
            'to' => ['required', 'string', 'email'],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        $to = $request->to;
        $subject = $request->subject;
        $content = nl2br($request->content);
        $template = 'emails.demoMail';

        Mail::to($to)->send(new DemoMail($subject, $content, $template));

        return redirect('/')->with('flash', 'Send Email Successfully');
    }
}
