@extends('layout')

@section('content')
	@if ($count>0) 
		@for ($i=0;$i<$count;$i++)  <!--Looping through response array-->
			<h3><a href="{{ $searchResponse[$type][$i]['related'][0]['url'] }}"> {{ $searchResponse[$type][$i]['name'] }} </a></h3>
		@endfor
	@endif	
@stop