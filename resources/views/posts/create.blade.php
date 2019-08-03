@extends('layouts.app')

@section('content')
    <h1 align="center">Create Page</h1>
<form action="/posts" method="post">
        
        <input type="text" name="user_id" placeholder="User ID" value="4"><br><br>
        <input type="text" name="title" placeholder="Give a title">
        <input type="textarea" name="content" placeholder="Write content here">
        <input type="submit" value="Submit" name="submit">
    
    </form>
@endsection