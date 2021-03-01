@extends('layouts.main')

@section('page-title', ucfirst($pom->name))

@section('content')
	<main class="main show" data-scroll-section>
		<div class="container">
			<livewire:pom.user.show :pom="$pom"/>
		</div>
    </main>
@endsection