@extends('layouts.master')

@section('header')
	<h2>About this site</h2>
	<h1>lv5_ess _1</h1>
@stop

@section('content')
	<!-- <p>There are over {{ $number_of_cats }} cats on this site!</p> -->
	<p>There are over {{ DB::table('cats')->count() }} cats on this site!</p>
	
@stop
