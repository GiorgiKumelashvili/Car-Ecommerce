<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class LettersController extends Controller {
    public function index(): Renderable {
        return view('user.my_letter', ['user' => Auth::user()]);
    }
}
