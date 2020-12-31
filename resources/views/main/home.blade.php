@extends('layouts.main')

@section('page-title', 'Home')

@section('page-styles')
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endsection

@section('page-content')
<div>
    <div class="brand">
        <h2 class="brand__title">
            Bubbles of Champain'
        </h2>
        <span class="brand__subtitle brand__shine">
            The pomeranian dog breed kennel
        </span>
    </div>
</div>


<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
        	<img src="{{ asset('images/pom-1.jpg') }}">
        </div>
        <div class="swiper-slide">
        	<img src="{{ asset('images/pom-1.jpg') }}">
        </div>
    </div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
@endsection