@extends('layouts.admin')

@section('content')
	<div class="single" x-data="{activeTab: 'info'}" x-cloak>
		<div class="single__tabs">
			<button 
				class="single__tabs--item" 
				:class="{'active': activeTab == 'info'}" 
				x-on:click="activeTab = 'info'"
			>
				Info
				<i class="fas fa-info-circle"></i>
			</button>

			<button 
				class="single__tabs--item" 
				x-on:click="activeTab = 'images'" 
				:class="{'active': activeTab == 'images'}"
			>
				Images
				<i class="fas fa-image"></i>
			</button>
		</div>

		<livewire:pom.update-info :id="$id"/>

		<livewire:pom.update-images :id="$id"/>
	</div>
@endsection