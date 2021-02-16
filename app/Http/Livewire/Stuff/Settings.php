<?php

namespace App\Http\Livewire\Stuff;

use Livewire\Component;
use App\Models\Breeder;
use App\Models\Owner;

class Settings extends Component
{
	public $breeders, $owners;
	public $breeder, $owner;
	public $success;

	protected $listeners = ['rerender' => '$refresh'];

	public function mount()
	{
		$this->breeders = Breeder::all();
		$this->owners = Owner::all();
	}

	public function store($key)
	{
		if ($key === 'breeder') {
			$this->validate(['breeder' => 'unique:breeders']);
			Breeder::create(['breeder' => $this->breeder]);
		} else if ($key === 'owner') {
			$this->validate(['owner' => 'unique:owners']);
			Owner::create(['owner' => $this->owner]);
		}

		$this->emit('rerender');
		$this->success = 'Success! Object created.';
	}

	public function destroy($key, $id)
	{
		if ($key === 'breeder') {
			Breeder::find($id)->delete();
			$this->success = 'Success! Breeder deleted';
		} else if ($key === 'owner') {
			Owner::find($id)->delete();
			$this->success = 'Success! Owner deleted';
		}

		$this->emit('rerender');
	}

    public function render()
    {
        return view('livewire.stuff.settings');
    }
}
