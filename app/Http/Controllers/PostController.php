<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //reading Post table's data(gets here automatically after submitting in create route)
        $posts = Post::all();
        return view('posts.index', compact('posts'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user_id = intval($request->user_id);
        //return gettype($request->user_id);
        Post::create($request->all()); //$request gets all input values as arrays and create method stores them
        // $posts = new Post;
        // // $posts->title = $request->title;
        // $posts->user_id = $request->id;
        // $posts->title = $request->title;
        // $posts->content = $request->content;
        // $posts->save();
        return redirect('/posts');  //redirecting to specific place
        //************* */IMP(user_id is not being saved to database for some reason**********
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post')); //compact takes variable as parameter without $ sign
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect("/posts");
    }

    public function showPost(){
        $people = ['Rahi', 'Samu', 'Saidur'];
        return view('post', compact('people'));
    }

    public function contact($no, $pass){
        return view('contact', compact('no', 'pass'));
    }
}
