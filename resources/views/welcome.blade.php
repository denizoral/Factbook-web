@extends('layouts.master')
@section('title Welcome')

@section('content')


    <div>
        <h2 class="display-4 text-center">Welcome to Factbook!</h2>
        <h4 class="text-center">Factbook is a website where you can talk about facts of places you visit, things you buy, or for just general conversation really.</h4>
        <h4 class="text-center">Sit back and enjoy the conversations online!</h4>
        <hr>
        <h2 class="display-4 text-center">How do I start?</h2>
        @if (Auth::user())
        <h4 class="text-center">Seems like you're already logged in! What are you doing here? Click the factbook logo on top left and enjoy the content! :)</h4>
        @else
        <h4 class="text-center">Click the register or login button on top and get started posting content on factbook!</h4>
        @endif
        
    </div>


@endsection