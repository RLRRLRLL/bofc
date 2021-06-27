<?php

namespace App\Http\Livewire\Visitor\Poms;

use App\Models\Pom;
use Livewire\Component;

class Index extends Component
{
	// filter
	public $pomGender = 'all';
	public $pomAges = [];
	public $pomForSale;
	public $pomHasTitles;
	public $pomIsOpen;

    public function render()
    {
		$poms = Pom::where('is_published', 1)
					->whereNotNull($this->pomHasTitles ? 'titles' : 'id')
					->where('is_for_sale', $this->pomForSale ? 1 : '!=', 2)
					->where('is_open_for_breeding', $this->pomIsOpen ? 1 : '!=', 2)
					->where('is_male', $this->pomGender !== 'all' ? $this->pomGender : '!=', 2)
					->where('age', count($this->pomAges) > 0 ? $this->pomAges[0] : '!=', 2)
					->where('age', count($this->pomAges) > 1 ? $this->pomAges[1] : '!=', 2)
					->where('age', count($this->pomAges) > 2 ? $this->pomAges[2] : '!=', 2)
					->paginate(10);

        return view('livewire.visitor.poms.index', [
			'poms' => Pom::where('is_published', 1)->get()
		])->extends('layouts.app')->section('content');
    }
}
