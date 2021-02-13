@extends('layouts.main')

@section('page-title', 'Pomeranian')

@section('content')
    <div class="wrapper pomeranian">
		<div class="container">
			<livewire:pom.user.show :poms="$poms"/>
		</div>
    </div>
@endsection