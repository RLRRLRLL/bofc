<?php

namespace App\Http\Livewire\Pom\User;

use Livewire\Component;

class Index extends Component
{
	public $poms;

	public function mount($poms)
	{
		$this->poms = $poms;
	}

    public function render()
    {
        return view('livewire.pom.user.index');
    }
}
