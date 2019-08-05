<?php

use App\Photo;
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Video;

Route::get('/', function(){
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| MiddleWare is used to allow routes acess for certain type of user
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'web'], function () {
    //Creates CRUD routes for /posts
    Route::resource('/posts', 'PostController');

    //Accessor
    Route::get('/getname', function () {
        $user = User::find(1)->first();
        echo $user->name;
    });

    Route::get('/setname', function () {
        $user = User::find(5);
        $user->name = "animesh anjan";
        $user->save();
        echo $user->name;
    });
    
});
/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/


Route::get('/findwhere', function(){
    $posts = Post::where('id', 5)->get();
    
    if(sizeof($posts) == 0) { //if no data found, it returns empty array
        echo "Nothings Here dude go off!!"; 
    }else {
        foreach($posts as $post)
        return $post->title;
    }
    
});

Route::get('/read', function(){
    $posts = Post::all(); //selects all rows, doesn't needs get()

    foreach($posts as $post){
        return $post->title;
    }
});

Route::get('/basicinsert', function(){
    $posts = new Post;
    //$posts = Post::find(4);
    $posts->title = "Anike";
    $posts->content = "Japanese is Great";
    $posts->save();
});

Route::get('/create', function(){
    Post::create(['title' => 'Newly Created Title', 'content' => 'Newly Created Content']); //like an array
});

Route::get('/update', function(){
    Post::where('id', 5)->where('is_admin', false)->update(['title' => 'Tiashia is Habibi', 'content'=> 'Habibi is Tiasha']);
});

Route::get('/delete', function(){
    $posts = Post::find(4);
    $posts->delete();
});

Route::get('/destroy', function(){
    Post::destroy([3,4]);
});

Route::get('readsoftdelete', function () {
    $posts = Post::withTrashed()->where('is_admin', false)->get(); //withTrashed has empty parameter
    
    //$posts = Post::onlyTrashed()->where('is_admin', false)->get();
    foreach($posts as $post)
        echo $post->id . "<br>";
});

Route::get('/restore', function(){
    $posts = Post::onlyTrashed()->where('is_admin', false)->restore();
});

Route::get('/forcedelete', function(){
    $posts = Post::onlyTrashed()->where('id', 4);
    $posts->forcedelete();
});

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship
|--------------------------------------------------------------------------
*/

// One To One RelationShip

Route::get('/user/{id}/post', function($id){
    return User::find($id)->post->content;
});

//One to One Inverse

Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user->name;
});

// One To Many RelationShip


Route::get('/user/{id}/posts', function($id){
    
    $posts = User::find(1)->posts; //Using Relationship function doesn't requires get
    foreach($posts as $post){
        echo $post->title . "<br>";
    }

});

//Many to Many Relationship

Route::get('/user/{id}/role', function($id){  // finding Roles of User
    $roles = User::find($id)->roles;
    // $roles = User::find($id)->roles()->get(); //Works same as above one
    foreach($roles as $role)
        echo $role->name;
});

// Many to Many Inverse Relationship

Route::get('/role/{id}/user', function($id){  // finding User of specific role(Same technique)
    $users = Role::find($id)->users;
    foreach($users as $user)
        echo $user->name . "<br>";
});

// Has Many Through Relationship

Route::get('/country/{id}/user', function($id){
    $posts = Country::find($id)->posts;
    foreach($posts as $post)
        echo $post->title . "<br>";
});

//One to One Polymorphic

//Post to Image

Route::get('/post/{id}/image', function($id){
    $photos = Post::find($id)->photos;
    foreach($photos as $post)
        echo $post->path . "<br>";
    //return $posts;
});

//Post to Image

Route::get('/user/{id}/image', function($id){
    $photos = User::find($id)->photos;
    foreach($photos as $photo)
        echo $photo->path . "<br>";
    //return $posts;
});

//One to Many Polymorphic Inverse
//finding owner of the Image

Route::get('/image/{id}/post', function($id){
    $post = Photo::findOrFail($id);
    return $post->imageable;
    //return $posts;
});

//One to Many Polymorphic
//finding owner of the Image

Route::get('/image/{id}/post', function($id){
    $post = Photo::findOrFail($id);
    return $post->imageable;
    //return $posts;
});

//Many to Many Polymorphic
//Retriving the tag of the post

Route::get('/post/{id}/tag', function($id){
    $tags = Post::findOrFail($id)->tags;
    foreach($tags as $tag){
        echo $tag->name . "<br>";
    }
});

//Many to Many Polymorphic
//Retriving the tag of the Video

Route::get('/video/{id}/tag', function($id){
    $tags = Video::findOrFail($id)->tags;
    foreach($tags as $tag){
        echo $tag->name . "<br>";
    }
});

Route::resource('/posts', 'PostController');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Simple Linkings
|--------------------------------------------------------------------------
*/

// Route::get('/download/{post}', 'PostController@index');
// Route::get('/contact/{no}/{pass}', 'PostController@contact');
// Route::get('/post', 'PostController@showPost');
// Route::get('/about', function(){
//     return view('about');
// });

/*
|--------------------------------------------------------------------------
| Query Builder
|--------------------------------------------------------------------------
*/

// Route::get('/insert' , function(){
//     DB::insert('insert into posts(title,content) values(?,?)', ['A Title','Its a heading Brah]']);
// });

// Route::get('/find', function(){
//     $posts = Post::find(5);

//         return $posts->title;
    
// });

// Route::get('/read/{id}', function($id){
//     $results = DB::select('select * from posts where id = ?', [$id]);

//     foreach($results as $posts)
//         return $posts->title;
// });

// Route::get('/update/{id}', function($id){
//     $updated = DB::update('Update posts set title ="I just Changed The Title" where id = ? ', [$id]);
//     return $updated;
// });

// Route::get('/delete/{id}', function($id){
//     $delete = DB::delete('delete from posts where id = ? ', [$id]);
//     if($delete == 1){
//         return "Data Successfully Deleted";
//     }else {
//         return "The Data Does not exist";
//     }
    
// });


// Route::get('/example', function () {
//     return view('welcome');
// });

// Route::get("/app/{id}", function($id) {
//     return "Hi, This is an App number" . $id;
// });

// Route::get("/admin/post", array('as' => 'admin.home' , function(){
//     $url = route('admin.home');

//     return "The Route is " . $url;

// }));
