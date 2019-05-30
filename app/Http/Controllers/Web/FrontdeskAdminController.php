<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontdeskAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:frontdeskAdmin');
    }
    public function index()
    {
        return view('dashboard');
    }
}
