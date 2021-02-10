<?php

namespace App\Http\Livewire\Pom;

use App\Models\Pom;
use Livewire\Component;

class UploadInfo extends Component
{
	public $name, $color, $height, $weight, $teeth, 
	$birthday, $is_for_sale, $is_puppy, $father, $mother, 
	$grandfather, $grandmother, $breeder, $owner, $titles;

	// radio
	public $gender = 'male';
	public $has_fontanel = 'hasnt';

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
			'titles' => $this->titles,
			'birthday' => $this->birthday,
			'has_fontanel' => ($this->has_fontanel == 'has') ? 1 : 0,
			'is_for_sale' => ($this->is_for_sale) ? 1 : 0,
			'is_puppy' => ($this->is_puppy) ? 1 : 0,
			'father' => $this->father,
			'mother' => $this->mother,
			'grandfather' => $this->grandfather,
			'grandmother' => $this->grandmother,
			'breeder' => $this->breeder,
			'owner' => $this->owner,
		]);
		
		$pom->save();
		$this->emit('info-created', $pom->id);
		$this->dispatchBrowserEvent('hide-info-section');

		$this->reset();
	}

    public function render()
    {
        return view('livewire.pom.upload-info');
    }
}
