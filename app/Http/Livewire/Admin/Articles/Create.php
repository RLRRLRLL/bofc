<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.articles.create')
				->extends('layouts.admin')
				->section('content');
    }
}
