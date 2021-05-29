<?php

namespace App\Http\Livewire\Visitor\Poms;

use App\Models\Breeder;
use Livewire\Component;
use App\Models\Pom;

class Show extends Component
{
	public $pom;

	public function mount(Pom $pom)
	{
		$this->pom = $pom;
	}
	
    public function render()
    {
        return view('livewire.visitor.poms.show', [
			'poms' => Pom::all()
		])->extends('layouts.main')->section('content');
    }
}
