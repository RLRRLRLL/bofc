<?php

namespace App\Http\Livewire\Pom;

use Livewire\Component;
use App\Models\Breeder;
use App\Models\Owner;
use App\Models\Pom;

class UploadInfo extends Component
{
	// Base info
	public $name, $color, $height, $weight, 
	$teeth, $birthday, $is_for_sale, $is_puppy, $titles;

	// Collections for selects
	public $males, $females, $owners, $breeders;

	// O | B
	public $owner_id, $breeder_id;

	// Family ids
	public $father_id, $mother_id, $child_id, 
	$grandfather_id, $grandmother_id, $grandchild_id;

	// Radio
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
			'owner_id' => $this->owner_id,
			'breeder_id' => $this->breeder_id,
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
		$this->females = Pom::where('gender', 'female')->get();
		$this->males = Pom::where('gender', 'male')->get();
		$this->breeders = Breeder::all();
		$this->owners = Owner::all();

        return view('livewire.pom.upload-info', [
			'males' => $this->males,
			'owners' => $this->owners,
			'females' => $this->females,
			'breeders' => $this->breeders,
		]);
    }
}
