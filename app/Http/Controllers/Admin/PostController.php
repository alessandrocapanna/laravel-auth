<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $user = Auth::user();
        return view('admin.posts.index', compact('posts' , 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.posts.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!Auth::check()) {
        abort('404');
      }

      // //valido
      // $request->validate($this->validationData());

      $data = $request->all();

      $post_new = new Post();
      $post_new->user_id = Auth::id();
      $post_new->image_path = $data['image_path'];
      $post_new->title = $data['title'];
      $post_new->content = $data['content'];
      $post_new->save();


      return redirect()->route('admin.posts.show', $post_new);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $user = Auth::user();
        return view('admin.posts.edit', compact('post', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      // //valido
      // $request->validate($this->validationData());

      $request_data = $request->all();

      $post->title =  $request_data['title'];
      $post->content =  $request_data['content'];
      $post->user_id = Auth::id();

      $post->image_path =  $request_data['image_path'];
      $post->update();

      $post->save();

      return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    public function validationData() {
       return [
         'title' => 'required|max:255',
         'content' => 'required|max:1000',
         'image_path' => 'image',
       ];
     }
}
