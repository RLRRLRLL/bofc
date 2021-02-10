@extends('layouts.admin')

@section('content')
	<div class="single">
		<livewire:pom.update-info :id="$id"/>

		<livewire:pom.update-images :id="$id"/>
	</div>
@endsection