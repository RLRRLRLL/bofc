@extends('layouts.admin')

@section('content')
	<div class="single" x-data="{showModal: false}">
		<livewire:pom.update-info :id="$id"/>

		<livewire:pom.update-images :id="$id"/>
	</div>
@endsection