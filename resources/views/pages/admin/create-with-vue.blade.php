@extends('layouts.admin')

@section('content')
	<create-pom csrf="{{ csrf_token() }}"/>
@endsection