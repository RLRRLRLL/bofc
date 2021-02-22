<?php

namespace App\Http\Livewire\Pom\User;

use App\Models\Breeder;
use Livewire\Component;
use App\Models\Pom;

class Show extends Component
{
	public $poms;
	public $image_id;
	public $pom;

	public function mount($pom)
	{
		$this->pom = $pom;
		$this->poms = Pom::all();
		$this->image_id = $this->pom->images->first()->id;
	}

	// public function changeSlide($id)
	// {
	// 	$this->image_id = $id;
	// }
	
    public function render()
    {
        return view('livewire.pom.user.show');
    }
}
