@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">SEARCH</div>

                <div class="panel-body">
                    {{ Form::open(['url' => '/results' ])}}
                    <div >
                        {{ Form::text('query',null,['class' => 'input']) }}
                    </div>
                    <div >
                        {{ Form::submit('SEARCH', ['name' => 'type','class' => 'button', 'value'=>'xxxx']) }} 
                        {{ Form::submit('NEWS', ['name' => 'type','class' => 'button']) }} 
                        {{ Form::submit('TRENDING', ['name' => 'type','class' => 'button']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
