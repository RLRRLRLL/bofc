<?php

namespace App\Http\Livewire\Admin\Poms;

use Livewire\Component;
use App\Models\Person;
use App\Models\Pom;

class UploadInfo extends Component
{
	public $base_info = [
		'name', 'color', 'height', 'teeth'
	];

	protected $relations = [
		'breeder' => 'people', 
		'owner' => 'people', 
		'father' => 'parents', 
		'mother' => 'parents'
	];

	// Base info
	public $name, $color, $height, $teeth, $birthday, $titles, $age = 'adult';
	
	// Booleans
	public $is_for_sale = false, $has_fontanel = false, $is_open_for_breeding = false, $is_male = 'female';
	
	// Collections for selects
	public $people, $poms;
	
	// Relations
	public $father, $mother, $breeder, $owner;

	// rules
	protected $rules = [
		'name' => 'required',
		// 'color' => 'required',
		// 'height' => 'required',
		// 'teeth' => 'required',
		// 'birthday' => 'required'
	];

	public function mount()
	{
		$this->people = Person::all();
		$this->poms = Pom::all();
	}

	public function updated($propertyName) 
	{
		$this->validateOnly($propertyName);
	}

	public function attach($anywho, $id)
	{
		$this->$anywho = $id;
	}

	public function saveInfo()
	{
		$this->validate();

		$pom = new Pom([
			'age' => $this->age,
			'name' => $this->name,
			'color' => $this->color,
			'height' => $this->height,
			'teeth' => $this->teeth,
			'titles' => $this->titles,
			'birthday' => $this->birthday,
			'is_male' => $this->is_male === 'male' ? 1 : 0,
			'is_for_sale' => $this->is_for_sale,
			'has_fontanel' => $this->has_fontanel,
			'is_open_for_breeding' => $this->is_open_for_breeding,
		]);

		$pom->save();

		foreach($this->relations as $role => $relname) {
			if (!empty($this->$role)) {
				$pom->$relname()->attach($this->$role);
			}
		}

		$this->reset();
		$this->emit('info-created', $pom->id);
		$this->dispatchBrowserEvent('hide-info-section');
	}

    public function render()
    {
        return view('livewire.admin.poms.upload-info');
    }
}
