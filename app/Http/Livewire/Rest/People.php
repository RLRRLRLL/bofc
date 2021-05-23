<?php

namespace App\Http\Livewire\Rest;

use App\Models\Person;
use Livewire\Component;

class People extends Component
{
	// owner === 0, breeder === 1
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
		$this->owners = Person::where('type', 0)->get();
		$this->breeders = Person::where('type', 1)->get();
	}

	public function createPerson()
	{
		$this->validate();

		Person::create([
			'name' => $this->name,
			'type' => ($this->type === 'owner') ? 0 : 1
		]);

		$this->reset();

		$this->dispatchBrowserEvent('person-created', [
			'message' => __('Person created successfully.')
		]);
	}

	public function destroy($id)
	{
		Person::find($id)->delete();
		$this->emit('reloadPeople');
		$this->dispatchBrowserEvent('person-updated', [
			'message' => 'Success! Person deleted.'
		]);
	}
	
    public function render()
    {
		$people = Person::all();
		
        return view('livewire.rest.people', [
			'owners' => $people->where('type', 0),
			'breeders' => $people->where('type', 1)
		])->extends('layouts.admin')
			->section('content');
    }
}
