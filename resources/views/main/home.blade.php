@extends('layouts.main')

@section('page-title', 'Home')
@section('data-title', 'Home')

@section('page-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
@endsection

@section('page-content')
    <div class="wrapper home">
        <div class="cursor"></div>

        <div class="content">
            @include('includes.main.brand')
            @include('includes.main.slider')
        </div>
    </div>
@endsection

@push('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
@endpush