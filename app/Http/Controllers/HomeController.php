<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('/');
    }

    public function token()
    {
        $token = auth()->user()->createToken('API');

        return json_encode($token);
    }
}
