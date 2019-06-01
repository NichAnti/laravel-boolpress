@extends('layouts.mainLayout')

@section('content')

  <nav class="row justify-content-between bg-dark mb-4">

    @foreach($categories as $category)

      <div class="p-2">
        <a class=" text-white" href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
      </div>

    @endforeach

  </nav>

  <div class="row mb-4">

    @foreach($posts as $post)

      <div class="col-md-6 mb-2">
          <a href="{{ route('posts.show', $post->id) }}">

            <div class="border rounded shadow-sm overflow-hidden p-5">

                @foreach($post->categories as $category)

                  <span class="text-success">{{ $category->name }}</span>

                @endforeach

              <h2 class="text-dark">{{ $post->title }}</h2>
              <p class="text-body">{{ $post->content }} </p>
              <h4 class="text-dark">{{ $post->author }} </h4>


              <small class="text-body">{{ $post->created_at }} </small><br>

              <a role="button" class="btn btn-primary mb-1" href="{{ route('posts.edit', $post->id) }}">edit</a><br>

              <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="delete"></input>
              </form>

            </div>

          </a>
      </div>
    @endforeach
  </div>

  <a class="btn btn-dark btn-lg" href="{{ route('posts.create') }}">add new post</a>

@stop
