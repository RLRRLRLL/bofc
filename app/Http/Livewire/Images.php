<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Image;

class Images extends Component
{
	use WithFileUploads;

	public $images = [];
	public $pom_id = '';
	public $is_avatar = 0;

	protected $listeners = ['info-created' => 'receivePomID'];

	public function receivePomID($pomID) {
		$this->pom_id = $pomID;
	}
	
	public function storeImages()
    {
        $this->validate([
            'images.*' => 'image|max:10000|required',
		]);

		foreach($this->images as $img)
		{
			Image::create([
				'pom_id' => $this->pom_id,
				'url' => $img,
			]);

			// $img->store('images', 'public');
		}

		$this->dispatchBrowserEvent('hide-images-section');
		$this->emit('pom-created', $this->pom_id);
		$this->images = [];
	}
	
	public function cancelImage($index)
	{
		array_splice($this->images, $index, 1);
	}
	
    public function render()
    {
        return view('livewire.images');
    }
}