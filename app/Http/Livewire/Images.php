<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Image;
use App\Models\Pom;

class Images extends Component
{
	use WithFileUploads;

	public $images = [];
	public $pom_id = '';
	public $is_avatar = 0;

	protected $listeners = ['pass-pom-id' => 'receivePomID'];

	public function receivePomID($pomID) {
		$this->pom_id = $pomID;
	}
	
	public function storeImages()
    {
        $this->validate([
            'images.*' => 'image|max:3500|required',
		]);

		foreach($this->images as $img)
		{
			Image::create([
				'pom_id' => $this->pom_id,
				'url' => $img,
			]);

			$img->store('images', 'public');

			session()->flash('message', 'Images successfully uploaded.');
		}

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