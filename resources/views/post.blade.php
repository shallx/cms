@extends('layouts.app');

@section('content')
    <h1>This is a Post Page</h1>
    <ul>
    @if (count($people))
        @foreach ($people as $person)
            <li>{{$person}}</li>
         
        @endforeach
    
    </ul>    
    @endif
@endsection