@extends('layouts.main')

@section('page-title', __('Pomeranian'))

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css" integrity="sha512-wl80ucxCRpLkfaCnbM88y4AxnutbGk327762eM9E/rRTvY/ZGAHWMZrYUq66VQBYMIYDFpDdJAOGSLyIPHZ2IQ==" crossorigin="anonymous" />
@endpush

@section('content')
	<main class="main pomeranian" data-scroll-section>
		<livewire:pom.user.index :poms="$poms"/>
    </main>
@endsection