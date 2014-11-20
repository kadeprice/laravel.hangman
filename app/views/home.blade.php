@extends('layouts.default') 

@section('content')
<div class="content">
        <h1 class='text-info'>Welcome to Hangman</h1>
        {{ Session::get('word') }}
</div>
@stop