<?php

namespace App\Http\Livewire\Pom;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Image;

class UploadImages extends Component
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
            'images.*' => 'image|max:3500|required',
		]);

		foreach($this->images as $img)
		{
			$fileName = $img->getClientOriginalName();

			Image::create([
				'pom_id' => $this->pom_id,
				'url' => $fileName,
			]);

			$img->storeAs('images/'.$this->pom_id, $fileName, 'public');
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
        return view('livewire.pom.upload-images');
    }
}