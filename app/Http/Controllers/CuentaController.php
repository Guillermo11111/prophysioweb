<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PregSecreta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CuentaController extends Controller
{
    public function index(){
        return view('user.cuenta');
    }

}
