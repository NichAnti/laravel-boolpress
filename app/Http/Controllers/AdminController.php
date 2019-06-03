<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class AdminController extends Controller
{
  public function create()
  {
    $categories = Category::all();
    return view('pages.createNewPost', compact('categories'));
  }

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
    return redirect('/');
  }

  public function edit($id)
  {
    $post = Post::findOrFail($id);
    $categories = Category::all();

    return view('pages.editPost', compact('post', 'categories'));
  }

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
    return redirect('/');
  }

  public function destroy($id)
  {
    $post = Post::findOrFail($id);
    $post->categories()->detach();
    $post->delete();
    return redirect('/');
  }
}
