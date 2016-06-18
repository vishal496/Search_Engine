@extends('layout')

@section('header')
	@stop

@section('content')
	@if ($count>0) 
		@for ($i=0;$i<$count;$i++)  <!--Looping through response array-->
			<h3><a href="{{ $viewResponse[$type][$i]['url'] }}"> {{ $viewResponse[$type][$i]['title'] }} </a></h3>
			<p>{{ $viewResponse[$type][$i]['kwic'] }}</p>
		@endfor
	@endif				
@stop