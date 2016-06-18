@extends('layout')

@section('header')
    <link rel="stylesheet" href="css/style.css" />
@stop
    
@section('content')
    {{ Form::open(['url' => '/results' ])}}
        <div >
            {{ Form::text('query',null,['class' => 'input']) }}
        </div>
        <div >
            {{ Form::submit('SEARCH', ['name' => 'search','class' => 'button', 'value'=>'xxxx']) }} 
            {{ Form::submit('NEWS', ['name' => 'search','class' => 'button']) }} 
            {{ Form::submit('TRENDING', ['name' => 'search','class' => 'button']) }}
        </div>
    {{ Form::close() }}    
@stop
