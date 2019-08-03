@extends('layouts.app')

@section('content')
<h1 align="center">Show Page</h1>
    <h2>This is a list of Post Title</h1>
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
    <h3>Click <a href="{{route('posts.edit', $post->id)}}">here</a> to Edit</h3>
@endsection