<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;

class SearchController extends Controller
{
    public function searchPost() {

      $categories = Category::all();
      $posts = Post::all();

      return view("pages.search", compact('categories', 'posts'));

    }
    public function displayResult(Request $request) {

      $title = $request -> title;
      $content = $request -> content;
      $category = $request -> category;
      $author = $request -> author;

      $query = Post::query();

      if ($category) {

        $query = Category::findOrFail($category)->posts();
      }

      if($title) {

        $query = $query->where('title', 'LIKE', '%' . $title . '%');
      }
      if($content) {

        $query = $query->where('content', 'LIKE', '%' . $content . '%');
      }
      if($author) {

        $query = $query->where('author', 'LIKE', '%' . $author . '%');
      }

      $posts = $query->get();
      $categories = Category::all();

      return view("pages.home", compact('categories', 'posts'));

    }
}
