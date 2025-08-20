<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('content.authentications.auth-login-basic');
    }

    public function register()
    {
        return view('content.authentications.auth-register-basic');
    }

    public function forgotPassword()
    {
        return view('content.authentications.auth-forgot-password-basic');
    }

    public function resetPassword()
    {
        return view('content.authentications.auth-reset-password-basic');
    }

    public function verifyEmail()
    {
        return view('content.authentications.auth-verify-email-basic');
    }

    public function twoSteps()
    {
        return view('content.authentications.auth-two-steps-basic');
    }
}
