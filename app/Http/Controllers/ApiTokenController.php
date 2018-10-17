<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    public function show()
    {
        return optional(auth()->user()->apiToken)->token;
    }

    public function create()
    {
        auth()->user()->apiToken()->create([
            'token' => uniqid(rand(), 20),
        ]);

        return auth()->user()->apiToken->token;
    }
}
