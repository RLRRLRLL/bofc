@extends('layouts.main')

@section('page-title', __('Pomeranian'))

@section('content')
	<main class="main pomeranian" data-scroll-section>
		<livewire:pom.user.index :poms="$poms"/>
    </main>
@endsection