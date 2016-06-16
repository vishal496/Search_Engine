@extends('layout')

@section('content')
	@if ($topic_count>0) 
		@for ($i=0;$i<$topic_count;$i++)  <!--Looping through response array-->
			<h3><a href="{{ $response[$type][$i]['related'][0]['url'] }}"> {{ $response[$type][$i]['name'] }} </a></h3>
		@endfor
	@endif	
@stop