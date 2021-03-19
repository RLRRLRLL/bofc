<?php

namespace App\Http\Livewire\Rest;

use App\Models\Person as ModelsPerson;
use Livewire\Component;

class Person extends Component
{
	// owner === 0, breeder === 1

	public $owners, $breeders;

	public $name; 
	public $type = 'owner';

	protected $rules = [
		'name' => 'required|unique:people',
		'type' => 'required'
	];

	protected $listeners = [
		'reloadPeople' => '$refresh',
	];

	public function mount()
	{
		$this->owners = ModelsPerson::where('type', 0)->get();
		$this->breeders = ModelsPerson::where('type', 1)->get();
	}

	public function createPerson()
	{
		$this->validate();

		$person = new ModelsPerson();
		$person->name = $this->name;
		$person->type = ($this->type === 'owner') ? 0 : 1;
		$person->save();

		$this->name = '';
		$this->dispatchBrowserEvent('person-updated', [
			'message' => 'Success! Person created.'
		]);
	}

	public function destroy($id)
	{
		ModelsPerson::find($id)->delete();
		$this->emit('reloadPeople');
		$this->dispatchBrowserEvent('person-updated', [
			'message' => 'Success! Person deleted.'
		]);
	}
	
    public function render()
    {
        return view('livewire.rest.person');
    }
}
