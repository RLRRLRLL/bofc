<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainPagesController extends Controller
{
    public function homepage()
    {
        return view('main.home');
    }
}
