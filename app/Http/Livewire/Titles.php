<?php

namespace App\Http\Livewire;

use App\Models\Pom;
use Livewire\Component;

class Titles extends Component
{
	public $titles = [];
	public $pom_id = '';

	protected $listeners = ['pom-created' => 'receivePomID'];

	public function receivePomID($pomID) {
		$this->pom_id = $pomID;
	}

	public function saveTitles()
	{
		return 'OK';
		// $this->dispatchBrowserEvent('hide-titles-section');
	}

    public function render()
    {
        return view('livewire.titles');
    }
}
