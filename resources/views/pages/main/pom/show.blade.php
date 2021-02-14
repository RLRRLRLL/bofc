@extends('layouts.main')

@section('page-title', ucfirst($pom->name))

@section('content')
    <div class="wrapper pomeranian">
		<div class="container">
			<livewire:pom.user.show :pom="$pom"/>
		</div>
    </div>
@endsection