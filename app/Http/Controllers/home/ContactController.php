<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        return view('contact');
    }

    public function sendMail(Request $request) {
        $request->validate([
            "name_surname" => "required|alpha",
            "email" => "required",
            "letter" => "required"
        ]);

        dd($request->all());
    }
}
