<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\MailSender;

use App\Post;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

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

    public function mailPage()
    {
      return view('pages.email-page');
    }

    public function sendMail(Request $request) {

      $title = $request -> title;
      $desc = $request -> content;
      $user = $request -> user();
      $username = $user -> name;

      // Mail::to($request->user())->send(new MailSender());
      Mail::to('admin@gmail.com')->queue(new MailSender($username, $title, $desc));


      return redirect()->route('home')->with('success', 'mail sent');
    }
}
