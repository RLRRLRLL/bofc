<?php

namespace App\Http\Livewire;

use App\Models\Pom;
use Livewire\Component;

class Info extends Component
{
	public $name, $color, $height, $weight, $teeth, 
	$birthday, $fontanel, $is_for_sale, $is_puppy, $father, $mother, 
	$grandfather, $grandmother, $breeder, $owner, $title;
	
	public $gender = 'male';

	public $successMessage;

	protected $rules = [
		'name' => 'required',
		// 'color' => 'required',
		// 'gender' => 'required',
		// 'height' => 'required',
		// 'weight' => 'required',
		// 'teeth' => 'required',
		// 'birthday' => 'required',
		// 'fontanel' => 'required',
		// 'title' => 'required',
		// 'breeder' => 'required',
		// 'owner' => 'required',
		// 'father' => 'required',
		// 'mother' => 'required',
		// 'grandfather' => 'required',
		// 'grandmother' => 'required',
	];

	public function updated($propertyName) 
	{
		$this->validateOnly($propertyName);
	}

	public function saveInfo()
	{
		$this->validate();

		$pom = new Pom([
			'name' => $this->name,
			'color' => $this->color,
			'gender' => $this->gender,
			'height' => $this->height,
			'weight' => $this->weight,
			'teeth' => $this->teeth,
			'birthday' => $this->birthday,
			'fontanel' => $this->fontanel,
			'is_for_sale' => ($this->is_for_sale) ? 1 : 0,
			'is_puppy' => ($this->is_puppy) ? 1 : 0,
			'father' => $this->father,
			'mother' => $this->mother,
			'grandfather' => $this->grandfather,
			'grandmother' => $this->grandmother,
			'breeder' => $this->breeder,
			'owner' => $this->owner,
			'title' => $this->title,
		]);

		dd($pom);

		$pom->save();
		$this->emit('pass-pom-id', $pom->id);
		$this->dispatchBrowserEvent('hide-info-section');

		$this->reset();
		$this->successMessage = 'Form submitted!';
	}

    public function render()
    {
        return view('livewire.info');
    }
}
