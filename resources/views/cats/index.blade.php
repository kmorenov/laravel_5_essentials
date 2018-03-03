@extends('layouts.master')

@section('header')
	@if (isset($breed))
		<a href="{{ url('/') }}">Back to overview</a>
	@endif
	{{----}}
	<p>
		<a href="{{ url('/about') }}">About (my link)</a>

	</p>
	<h2>
		All @if (isset($breed)){{ $breed }}@endif Cats
		<a href="{{ url('cats/create') }}" class="btn btn-primary pull-right">
			Add a new cat
		</a>
	</h2>
@stop

@section('content')
	@foreach ($cats as $cat)
		<div class="cat">
			<p>
				<a href="{{ url('cats/'.$cat->id) }}">
				<strong>{{ $cat->name }}</strong>
				{{--<strong>{{ $cat->name }}</strong> - {{ $cat->breed->name }} - {{ $cat->date_of_birth }}--}}
				</a>
				{{--{{$cat->id}}--}}
				{{--<strong>--}}
					{{--{{ $cat->name }}--}}
				{{--</strong>--}}
			</p>

		</div>
	@endforeach
@stop
