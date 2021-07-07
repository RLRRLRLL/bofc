<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminPagesController extends Controller
{
    public function settings()
    {
        return view('pages.admin.settings');
    }
}
