<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
	use WithFileUploads;

	public $article;

	// editables
	public $title, $body, $current_images;

	// new images
	public $images = [];

	protected $rules = [
		'title' => ['string', 'min:5', 'required'],
		'body' => ['max:500', 'min:10', 'required'],
		'images.*' => ['mimes:jpg,png,jpeg,webp,gif,svg', 'image'],
	];
	
	public function mount($id)
	{
		$this->article = Article::find($id);

		$this->title = $this->article->title;
		$this->body = $this->article->body;

		// current images e.g. images that are already stored 
		// in db when post have been created
		$this->current_images = $this->article->images;
	}

	public function updateArticle()
	{
		$this->validate();

		$this->article->update([
			'title' => $this->title,
			'body' => $this->body
		]);

		if (count($this->images) > 0) {
			foreach ($this->images as $image)
			{
				$file_name = $image->getClientOriginalName();

				$this->article->images()->create([
					'url' => $file_name
				]);

				$image->storeAs('images/articles/'.$this->article->id, $file_name, 'public');
			}
		}

		$this->dispatchBrowserEvent('show-alert', [
			'type' => 'success',
			'message' => __('Article was successfully updated.'),
			'persistent' => false
		]);
	}

	public function publishArticle()
	{
		$this->article->update([
			'is_published' => true
		]);
	}

	public function deleteImage(Image $image)
	{
		$image->delete();

		$this->dispatchBrowserEvent('show-alert', [
			'type' => 'success',
			'message' => __('Image was successfully deleted.'),
			'persistent' => false
		]);
	}

	public function cancelImage($index)
	{
		array_splice($this->images, $index, 1);
	}
	
    public function render()
    {
        return view('livewire.admin.articles.show')
			->extends('layouts.admin')
			->section('content');
    }
}
