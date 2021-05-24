<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
	use WithFileUploads;

	public $title, $body, $images = [];

	// if image is main
	public $is_main = false;

	protected $rules = [
		'title' => ['string', 'min:5', 'required'],
		'body' => ['max:500', 'min:10', 'required'],
		'images' => ['required'],
		'images.*' => ['mimes:jpg,png,jpeg,webp,gif,svg', 'image'],
	];

	public function createArticle()
	{
		$this->validate();

		$article = Article::create([
			'title' => $this->title,
			'body' => $this->body
		]);

		foreach ($this->images as $image)
		{
			$file_name = $image->getClientOriginalName();

			$article->images()->create([
				'url' => $file_name
			]);

			$image->storeAs('images/articles/'.$article->id, $file_name, 'public');
		}

		$this->reset();

		throwAlert($this, 'success', __('Article was successfully created.'));

		$this->dispatchBrowserEvent('article-created', [
			'id' => $article->id
		]);
	}

	public function cancelImage($index)
	{
		array_splice($this->images, $index, 1);
	}
	
    public function render()
    {
        return view('livewire.admin.articles.create')
				->extends('layouts.admin')
				->section('content');
    }
}
