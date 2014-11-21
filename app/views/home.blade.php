@extends('layouts.default') 

@section('content')
<div class="content">
    <div class="container">
        
            <h1 class='text-info'>Welcome to Hangman</h1>
        <div class="row col-sm-4">
            {{ HTML::image("images/".count(Session::get('wrong')).".gif", "Hangman") }}
        </div>
        
        <div class="row col-sm-4">
            @if(Session::has('died'))
                <h1 class="text-danger">You have Died!</h1>
                <p>The word was <strong> {{ Session::get('word') }} </strong> </p>
                <p> Click Generate a Word to try again. </p>
            @endif

            @if(Session::has('solved'))
                <h1 class='text-primary'>You Solved it!!</h1>
            @endif

            @if(!Session::has('solved') AND !Session::has('died') )
                <h3>{{ Session::get('displayWord') }}</h3>

                {{ Form::open(["action" => "WordController@guess"]) }}
                    {{ Form::label('guess',"Guess", ['class' => 'text-muted']) }}
                    {{ Form::text('guess',null,["placeholder" => 'Guess']) }}
                    <br/>
                    {{ Form::submit("Make a Guess!") }}
                {{ Form::close() }}
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