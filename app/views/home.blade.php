@extends('layouts.default') 

@section('content')
<div class="content">
    
    <h1 class='text-info'>Welcome to Hangman</h1><hr/>
    <div class="container">
        
        <div class="row col-sm-4">
            {{ HTML::image("images/".count(Session::get('wrong')).".gif", "Hangman") }}
        </div>
        
        <div class="row col-sm-4">
            @if(Session::has('died'))
                <h1 class="text-danger">You have Died!</h1>
                <p>
                    The word was <strong> {{ Session::get('word') }} </strong> <br/>
                {{ Words::grab_xml_definition() }}
                </p>
                <p> Click Generate a Word to try again. </p>
            @endif

            @if(Session::has('solved'))
                <h1 class='text-primary'>You Solved it!!</h1>
                <h3>{{ Session::get('word') }}</h3>
                <p>{{ Words::grab_xml_definition() }}</p>
            @endif

            @if(!Session::has('solved') AND !Session::has('died') )
                <h3>{{ Session::get('displayWord') }}</h3>
               
                {{ Form::open(["action" => "WordController@guess", 'class' => 'form-horizontal', 'role' => 'form']) }}
                <div class="form-group">
                    {{ Form::label('guess',"Guess a Letter", ['class' => 'text-muted control-label lead']) }}
                    {{ Form::text('guess',null,["class" =>"form-control text-center", "autofocus" => "autofocus", "maxlength" => 1, "autocomplete" => "off"]) }}
                </div>
                <div class="form-group">
                    {{ Form::submit("Make a Guess!",['class' => 'btn btn-md btn-info']) }}
                </div>
                {{ Form::close() }}
                <a href='definition' class='btn btn-sm btn-danger'>Help</a>
                @if(Session::has('definition'))
                    <div>
                        {{ Session::get('definition') }}
                    </div>
                @endif
            @endif
        </div>
        
        <div class="row col-sm-4 text-left">
            <h3>Wrong Guesses</h3>
            <p>
                @if(Session::has('wrong'))
                    @foreach(Session::get('wrong') as $wrong)
                        {{ $wrong }} &nbsp;
                    @endforeach
                @endif
            </p>
        </div>
    </div>
        
</div>
@stop