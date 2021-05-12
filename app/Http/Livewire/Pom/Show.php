<?php

namespace App\Http\Livewire\Pom;

use App\Models\Breeder;
use Livewire\Component;
use App\Models\Pom;

class Show extends Component
{
	public $poms;
	public $pom;

	public function mount($pom)
	{
		$this->pom = $pom;
		$this->poms = Pom::all();
	}
	
    public function render()
    {
        return view('livewire.pom.show');
    }
}
