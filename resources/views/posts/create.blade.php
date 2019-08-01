@extends('layouts.app')

@section('content')
    <form action="/posts" method="post">
        
        <input type="text" name="title"placeholder="Enter here">
        <input type="submit" value="Submit" name="submit">
    
    </form>
@endsection