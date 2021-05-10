<?php

namespace App\Http\Controllers;

use App\Mail\MailContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller {
    public function send(Request $request) {
        $request->validate([
            "name_surname" => "required|alpha",
            "email" => "required",
            "letter" => "required"
        ]);

        $fromEmail = $request->input('email');
        $name = $request->input('name_surname');
        $text = $request->input('letter');

        Mail::to(env('MAIL_USERNAME'))->send(new MailContact($fromEmail, $name, $text));

        return view('contact', ['letter' => 'letter sent']);
    }
}
