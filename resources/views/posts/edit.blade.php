@extends('layouts.app')

@section('content')
    <h1 align="center">Edit Page</h1>
    <form action="/posts/{{$post->id}}" method="post">
        {{csrf_field()}} <!--Generates token, used here to change POST method to PUT-->
        <input type="hidden" name="_method" value="PUT"> <!--The PUT value here will taka a token value and change form method to POST"-->
        <input type="number" name="user_id" placeholder="User ID" value="{{$post->user_id}}"><br><br>
        <input type="text" name="title" value="{{$post->title}}">
        <input type="text" name="content" value="{{$post->content}}">
        <input type="submit" value="Submit" name="submit">
    
    </form>

    <form method="post" action="/posts/{{$post->id}}" >
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="Submit" value="DELETE">
    </form>
@endsection