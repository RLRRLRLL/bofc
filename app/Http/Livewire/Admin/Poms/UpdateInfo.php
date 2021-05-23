<?php

namespace App\Http\Livewire\Admin\Poms;

use Livewire\Component;
use App\Models\Person;
use App\Models\Pom;

class UpdateInfo extends Component
{
	// base
	public $name, $color, $height, $teeth, $birthday, $titles;
	public $base_info = [
		'name', 'color', 'height', 'teeth'
	];

	// rels
	protected $relations = [
		'breeder' => 'people', 
		'owner' => 'people', 
		'father' => 'parents', 
		'mother' => 'parents'
	];

	public $pom, $people, $poms;
	public $father, $mother, $breeder, $owner;

	protected $listeners = ['reloadVars' => '$refresh'];
	
	public function mount($id)
	{
		$this->pom = Pom::find($id);
		$this->poms = Pom::where('id', '!=', $this->pom->id)->get();
		$this->people = Person::all();
		// 
		$this->father = $this->pom->parents()->where('is_male', 1)->first();
		$this->mother = $this->pom->parents()->where('is_male', 0)->first();
		$this->breeder = $this->pom->people()->where('type', 1)->first();
		$this->owner = $this->pom->people()->where('type', 0)->first();
	}
	
	public function updateInfo($string)
	{
		$this->pom->$string = $this->$string;
		$this->pom->update();
	}

	public function toggleParam($param)
	{
		$this->pom->$param = 1 - $this->pom->$param;
		$this->pom->update();
	}

	public function attach($anywho, $id)
	{
		if ($anywho === 'father' || $anywho === 'mother') {
			if ($anywho === 'father') {
				if ($this->father != null) {
					$this->pom->parents()->detach($this->father);
				}

				$this->pom->parents()->attach($id);
			} else {

				if ($this->mother != null) {
					$this->pom->parents()->detach($this->mother);
				}

				$this->pom->parents()->attach($id);
			}
		} else {
			if ($anywho === 'breeder') {
				
				if ($this->breeder != null) {
					$this->pom->parents()->detach($this->breeder);
				}
				
				$this->pom->parents()->attach($id);
			} else {
				
				if ($this->owner != null) {
					$this->pom->parents()->detach($this->owner);
				}
				
				$this->pom->parents()->attach($id);
			}
		}
	}

	public function detach($anywho, $type)
	{
		$this->pom->$type()->detach($this->$anywho);
		$this->emitSelf('reloadVars');
	}
	
    public function render()
    {
		return view('livewire.admin.poms.update-info');
    }
}
