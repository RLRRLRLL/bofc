<?php

namespace App\Http\Livewire\Pom;

use App\Models\Pom;
use Livewire\Component;

class UpdateImages extends Component
{
	public $pom;

	public function mount($id)
	{
		$this->pom = Pom::find($id);
	}

    public function render()
    {
        return view('livewire.pom.update-images');
    }
}
