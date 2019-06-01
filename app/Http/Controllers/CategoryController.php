<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Category::findOrFail($id)->posts;
        $categories = Category::all();

        return view('pages.showPostsCat', compact('posts', 'categories'));
    }

}
