<?php

namespace App\Http\Livewire\Pom;

use Livewire\Component;
use App\Models\Breeder;
use App\Models\Owner;
use App\Models\Pom;

class UpdateInfo extends Component
{
	public $pom;

	// base
	public $name, $gender, $color, $height, $weight, $teeth, $birthday, $titles;

	// Collections for selects
	public $males, $females, $owners, $breeders;

	// O | B ids
	public $owner_id, $breeder_id;

	// Family ids
	public $father_id, $mother_id, $child_id, 
	$grandfather_id, $grandmother_id, $grandchild_id;
	
	public function mount($id)
	{
		$this->pom = Pom::find($id);
	}
	
	public function updateInfo($string)
	{
		$this->pom->$string = $this->$string;
		$this->pom->update();
	}

	public function toggleParam($param)
	{
		$current = $this->pom->$param;
		$current = !$current;
		$this->pom->$param = $current ? 1 : 0;
		$this->pom->update();
	}

	public function applyOption($param, $id)
	{
		$this->pom->update([$param => $id]);
	}
	
    public function render()
    {
		$this->females = Pom::where('gender', 'female')->get();
		$this->males = Pom::where('gender', 'male')->get();
		$this->breeders = Breeder::all();
		$this->owners = Owner::all();
		
        return view('livewire.pom.update-info', [
			'males' => $this->males,
			'owners' => $this->owners,
			'females' => $this->females,
			'breeders' => $this->breeders,
		]);
    }
}
