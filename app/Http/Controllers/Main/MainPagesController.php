<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pom;

class MainPagesController extends Controller
{
    public function homepage()
    {
        return view('pages.main.home');
    }

    public function poms() 
    {
		$poms = Pom::where('is_published', 1)->get();
        return view('pages.main.poms', ['poms' => $poms]);
    }
}
