<?php

namespace App\Http\Livewire\Pom;

use Livewire\Component;
use App\Models\Person;
use App\Models\Pom;

class UpdateInfo extends Component
{
	public $pom;
	public $allBreeders, $allOwners;
	public $breeder, $owner;

	// base
	public $name, $gender, $color, $height, $weight, $teeth, $birthday, $titles;

	// Collections for selects
	public $males, $females;

	// Family ids
	public $father_id, $mother_id, $child_id, 
	$grandfather_id, $grandmother_id, $grandchild_id;

	protected $listeners = [
		'reloadPeople' => '$refresh'
	];
	
	public function mount($id)
	{
		$this->pom = Pom::find($id);
		$this->breeder = $this->pom->people()->where('type', 1)->first();
		$this->owner = $this->pom->people()->where('type', 0)->first();
		$this->allBreeders = Person::where('type', 1)->get();
		$this->allOwners = Person::where('type', 0)->get();
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

	public function attachPerson($type, $id)
	{
		$person = Person::find($id);

		// checking if there's already person selected
		// and replacing him in this case
		if ($type === 'breeder' && $this->breeder != null) {
			$this->pom->people()->detach($this->breeder);
		} else if ($type === 'owner' && $this->owner != null) {
			$this->pom->people()->detach($this->owner);
		}

		$this->pom->people()->attach($person);
		$this->emitSelf('reloadPeople');
	}
	
    public function render()
    {
		$this->females = Pom::where('gender', 'female')->get();
		$this->males = Pom::where('gender', 'male')->get();

		return view('livewire.pom.update-info', [
			'males' => $this->males,
			'females' => $this->females,
		]);
    }
}
