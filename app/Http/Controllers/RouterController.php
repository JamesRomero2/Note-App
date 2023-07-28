<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function goToLoginPage() {
        return view('login');
    }
    public function goToRegisterPage() {
        return view('register');
    }
}
