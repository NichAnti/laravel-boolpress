<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function showFirstFive()
    {
      $posts = Post::orderByDesc('created_at')->take(5)->get();
      $categories = Category::all();

      return view('pages.home', compact('posts', 'categories'));
    }

    public function showPost($id)
    {
      $post = Post::findOrFail($id);
      return view('pages.showPost', compact('post'));
    }

    public function showCategoryPosts($id)
    {
        $posts = Category::findOrFail($id)->posts;
        $categories = Category::all();

        return view('pages.showPostsCat', compact('posts', 'categories'));
    }
}
