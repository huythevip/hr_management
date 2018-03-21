<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HrController extends Controller
{
    public function login()
    {
    	return view('login');
    }
}
