<?php

namespace App\Http\Livewire\Admin;

use App\Models\Person;
use Livewire\Component;

class People extends Component
{
	public $name, $type = 'owner';

	protected $rules = [
		'name' => 'required|unique:people',
		'type' => 'required'
	];

	public function createPerson()
	{
		$this->validate();

		Person::create([
			'name' => $this->name,
			'type' => ($this->type === 'owner') ? 0 : 1
		]);

		$this->reset();

		throwAlert($this, 'success', __('Person was successfully created.'));
	}

	public function destroy(Person $person)
	{
		$person->delete();
	}
	
    public function render()
    {
		$people = Person::all();
		
        return view('livewire.admin.people', [
			'owners' => $people->where('type', 0),
			'breeders' => $people->where('type', 1)
		])->extends('layouts.admin')
			->section('content');
    }
}
