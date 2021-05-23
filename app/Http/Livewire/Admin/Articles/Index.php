<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use Livewire\Component;

class Index extends Component
{
	public $articles;

	public function mount()
	{
		$this->articles = Article::all();
	}

    public function render()
    {
        return view('livewire.admin.articles.index')
				->extends('layouts.admin')
				->section('content');
    }
}
