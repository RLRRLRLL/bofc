@extends('layouts.main')

@section('page-title', ucfirst($pom->name))

@section('content')
	<main class="main show" data-scroll-section>
		<livewire:pom.user.show :pom="$pom"/>
    </main>
@endsection