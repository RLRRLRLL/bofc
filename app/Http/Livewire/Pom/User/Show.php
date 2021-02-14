<?php

namespace App\Http\Livewire\Pom\User;

use Livewire\Component;

class Show extends Component
{
	public $pom;
	public $image_id;

	public function mount($pom)
	{
		$this->pom = $pom;
		$this->image_id = $this->pom->images->first()->id;
	}

	public function changeSlide($id)
	{
		usleep( 250000 );
		$this->image_id = $id;
	}
	
    public function render()
    {
        return view('livewire.pom.user.show');
    }
}
