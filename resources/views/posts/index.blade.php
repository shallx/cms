@extends('layouts.app')

@section('content')
    <h1>This is a list of Post Title</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{$post->title}}</li>
            
        @endforeach
    </ul>
@endsection