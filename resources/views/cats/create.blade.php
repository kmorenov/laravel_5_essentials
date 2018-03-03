@extends('layouts.master')

@section('header')
	<h2>Add a new cat</h2>
@stop

@section('content')
<h2>in .create </h2>
	{!! Form::open(['url' => '/cats']) !!}
		@include('partials.forms.cat')
	{!! Form::close() !!}
<h2>end of .create </h2>
@stop
