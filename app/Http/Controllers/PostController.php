<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $posts = Post::orderByDesc('created_at')->take(5)->get();
      $categories = Category::all();

      return view('pages.home', compact('posts', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('pages.createNewPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validateData = $request->validate([

        'title' => 'required',
        'content' => 'required',
        'author' => 'required',
        'category' => 'required'
      ]);

      $post = Post::create($validateData);
      $categories = Category::find($validateData['category']);
      $post->categories()->attach($categories);
      return redirect('posts');
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
      return view('pages.showPost', compact('post'));
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
      $categories = Category::all();

      return view('pages.editPost', compact('post', 'categories'));
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
      $validateData = $request->validate([

        'title' => 'required',
        'content' => 'required',
        'author' => 'required',
        'category'=> 'required'
      ]);

      $post = Post::find(intval($id));
      $post->update($validateData);
      $categories = Category::find($validateData['category']);
      $post->categories()->sync($categories);
      return redirect('posts');
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
      $post->categories()->detach();
      $post->delete();
      return redirect('posts');
    }
}
