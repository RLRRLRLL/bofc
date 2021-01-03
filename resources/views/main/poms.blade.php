@extends('layouts.main')

@section('page-title', 'All poms')

@section('page-content')
    <div class="wrapper poms">
        <div class="cursor"></div>

        @include('includes.main.brand')
        @include('includes.main.gallery')
    </div>
@endsection