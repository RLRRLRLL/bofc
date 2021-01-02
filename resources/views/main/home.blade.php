@extends('layouts.main')

@section('page-title', 'Home')

@section('page-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
    
@endsection

@section('page-content')
<a class="brand" href="#">
    <h2 class="brand__title">
        {{ config('app.name') }}
    </h2>
    <span class="brand__subtitle brand__shine">
        The pomeranian dog breed kennel
    </span>
</a>


<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
            <img src="{{ asset('images/random-dogs/1.jpg') }}">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('images/random-dogs/2.jpg') }}">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('images/random-dogs/3.jpg') }}">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('images/random-dogs/4.jpg') }}">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('images/random-dogs/5.jpg') }}">
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
@endpush