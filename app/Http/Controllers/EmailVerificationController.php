<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function notificar(Request $request){
        return $request->user()->hasVerifiedEmail()
        ? redirect()->intended()->route('user.inicio')
        : $request->user()->sendEmailVerificationNotification(); view('auth.verify-email');
    }
}
