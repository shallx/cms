@extends('layouts.app')

@section('content')
    <h1>This is a list of Post Title</h1>
    <ul>
        @foreach ($posts as $post)
    <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
            
        @endforeach
    </ul>

    <br><br><a href="{{route('posts.create')}}">Create Post</a>
@endsection