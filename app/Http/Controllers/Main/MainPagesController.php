<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pom;
use Illuminate\Support\Facades\Request;

class MainPagesController extends Controller
{
    public function homepage()
    { // home page
        return view('pages.main.home');
    }

    public function gallery() 
    {
		return view('pages.main.gallery');
    }

	/**
	 * Pom pages stuff
	 * TODO: move to its own controller || livewire comp
	 */
    public function index() 
    { // show all poms
		$poms = Pom::where('is_published', 1)->get();
        return view('pages.main.pom.index', ['poms' => $poms]);
    }

    public function show($id) 
    { // show single pom
		$pom = Pom::find($id);
		return view('pages.main.pom.show', ['pom' => $pom]);
    }
}
