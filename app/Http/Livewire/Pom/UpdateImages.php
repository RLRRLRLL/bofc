<?php

namespace App\Http\Livewire\Pom;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Image;
use App\Models\Pom;

class UpdateImages extends Component
{
	use WithFileUploads;

	protected $listeners = ['refreshImages' => '$refresh'];

	public $pom;
	public $pom_id = '';
	public $images = [];

	public function mount($id)
	{
		$this->pom = Pom::find($id);
		$this->pom_id = $this->pom->id;
	}

	public function updateImages()
	{
		foreach($this->images as $img)
		{
			$fileName = $img->getClientOriginalName();

			Image::create([
				'url' => $fileName,
				'pom_id' => $this->pom_id,
			]);

			$img->storeAs('images/'.$this->pom_id, $fileName, 'public');
		}

		$this->images = [];
		$this->emit('refreshImages');
	}

	public function cancelImage($index)
	{
		array_splice($this->images, $index, 1);
	}

	public function removeExistingImage($id)
	{
		$image = Image::find($id);
		if ($image) $image->delete();
	}

    public function render()
    {
        return view('livewire.pom.update-images');
    }
}
