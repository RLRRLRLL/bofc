@extends('layouts.main')

@section('page-title', 'Pomeranian')

@section('content')
    <div class="wrapper pomeranian">
		<div class="container">
			<livewire:pom.user.index :poms="$poms"/>
		</div>
    </div>
@endsection