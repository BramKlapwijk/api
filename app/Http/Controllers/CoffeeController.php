<?php

namespace App\Http\Controllers;

use App\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function index()
    {
        return json_encode(Coffee::all());
    }
}
