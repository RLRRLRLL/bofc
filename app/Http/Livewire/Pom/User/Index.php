<?php

namespace App\Http\Livewire\Pom\User;

use App\Models\Pom;
use Livewire\Component;

class Index extends Component
{
	public $poms;

	// filter
	public $pomGender = 'all';
	public $pomAge = ['puppy', 'adult', 'senior'];
	public $pomForSale = 1;
	public $pomHasTitles = 0;
	public $pomIsOpenForBreeding = 0;

    public function render()
    {
		$this->poms = Pom::where('is_published', 1)
						 ->where('is_male', $this->pomGender !== 'all' ? $this->pomGender : '!=', 2)
						 ->where('age', count($this->pomAge) > 0 ? $this->pomAge[0] : '!=', 2)
						 ->where('age', count($this->pomAge) > 1 ? $this->pomAge[1] : '!=', 2)
						 ->where('age', count($this->pomAge) > 2 ? $this->pomAge[2] : '!=', 2)
						 ->whereNotNull($this->pomHasTitles === 1 ? 'titles' : 'id')
						 ->where('is_open_for_breeding', $this->pomIsOpenForBreeding)
						 ->get();

        return view('livewire.pom.user.index', [
			'poms' => $this->poms
		]);
    }
}
