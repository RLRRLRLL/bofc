<?php

namespace App\Http\Livewire\Pom;

use Livewire\Component;
use App\Models\Person;
use App\Models\Pom;

class UploadInfo extends Component
{
	// Base info
	public $name, $color, $height, $weight, $teeth, 
	$birthday, $is_for_sale, $is_puppy, $titles;

	// Collections for selects
	public $males, $females;

	// O | B
	public $owner, $breeder;

	// Family ids
	public $father_id, $mother_id, $child_id, 
	$grandfather_id, $grandmother_id, $grandchild_id;

	// Radio
	public $gender = 'male';
	public $has_fontanel = 'hasnt';
	public $age = 'adult';

	// rules
	protected $rules = [
		'name' => 'required',
		// 'color' => 'required',
		// 'height' => 'required',
		// 'weight' => 'required',
		// 'teeth' => 'required',
		// 'birthday' => 'required',
		// 'breeder' => 'required',
		// 'owner' => 'required',
	];

	public function updated($propertyName) 
	{
		$this->validateOnly($propertyName);
	}

	public function saveInfo()
	{
		// $this->validate();

		// dd($this->breeder, $this->owner);

		$pom = new Pom([
			'age' => $this->age,
			'name' => $this->name,
			'color' => $this->color,
			'gender' => $this->gender,
			'height' => $this->height,
			'weight' => $this->weight,
			'teeth' => $this->teeth,
			'titles' => $this->titles,
			'birthday' => $this->birthday,
			'has_fontanel' => ($this->has_fontanel == 'has') ? 1 : 0,
			'is_for_sale' => ($this->is_for_sale) ? 1 : 0,
			// 'person_id' => $this->person_id,
			'father_id' => $this->father_id,
			'mother_id' => $this->mother_id,
			'grandfather_id' => $this->grandfather_id,
			'grandmother_id' => $this->grandmother_id,
		]);

		$pom->save();

		$this->emit('info-created', $pom->id);
		$this->dispatchBrowserEvent('hide-info-section');
		$this->reset();
	}

    public function render()
    {

		// $owner = Person::where('type', 0)->find(6);
		// dd($owner);
		$this->females = Pom::where('gender', 'female')->get();
		$this->males = Pom::where('gender', 'male')->get();
		$this->people = Person::all();

        return view('livewire.pom.upload-info', [
			'males' => $this->males,
			'people' => $this->people,
			'females' => $this->females,
		]);
    }
}
