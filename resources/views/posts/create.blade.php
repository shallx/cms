@extends('layouts.app')

@section('content')
    <h1 align="center">Create Page</h1>
    <!--<form action="/posts" method="post">
        
        
        <input type="text" name="user_id" placeholder="User ID" value="4"><br><br>
        <input type="text" name="title" placeholder="Give a title">
        <input type="text" name="content" placeholder="Write content here">
        <input type="submit" value="Submit" name="submit">
     </form>-->
     {!! Form::open(['method' => "POST", 'action' => 'PostController@store', 'files' =>true]) !!}

         <div class="form-group">
            {!! Form::label('title', 'User ID:')!!}
            {!! Form::text('user_id', 1, ['class'=>'form-control'])!!} 
         </div>

         <div class="form-group">
            {!! Form::label('title', 'Title:')!!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!} 
         </div>

         <div class="form-group">
            {!! Form::label('title', 'Content:')!!}
            {!! Form::text('content', null, ['class'=>'form-control'])!!} 
         </div>

         <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'form-control'])!!} 
         </div>
    
    {!!Form::close()!!}
   @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
       
         <strong>Warning!</strong>
         <ul>
         @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
             
         @endforeach
         </ul>

      </div>
   @endif
    
   
@endsection