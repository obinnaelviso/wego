<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest:frontdeskAdmin')->except('logout');

    }

    public function frontdesk_index()
    {   
        return view('auth.loginFrontdeskAdmin');
    }

    /**
     * Logs in user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function frontdesk_login(Request $request)
    {
        $loginDetails = request(['email', 'password']);
        if(Auth::guard('frontdeskAdmin')->attempt($loginDetails))
            return redirect()->route('frontdesk_dashboard');
        else {
            // Display flash message
            session()->flash('errorLogin', 'Invalid username or password!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(Auth::guard('frontdeskAdmin')->check())
            Auth::guard('frontdeskAdmin')->logout();
        return redirect()->route('frontdesk_index');
    }
}
