@extends('layouts.mainLayout')

@section('content')

  @foreach($categories as $category)

    <a href="{{ route('categories.show', $category) }}">
      <h2>{{ $category->name }}</h2>
    </a>

  @endforeach

  @foreach($posts as $post)

    <a href="{{ route('posts.show', $post->id) }}">

      <div class="post">

        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }} </p>
        <h4>{{ $post->author }} </h4>

        <ul>
          @foreach($post->categories as $category)

            <li>{{ $category->name }}</li>

          @endforeach
        </ul>

        <small>{{ $post->created_at }} </small><br>

        <a href="{{ route('posts.edit', $post->id) }}">edit</a><br>

        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="delete"></input>
        </form>

      </div><br>

    </a>

  @endforeach

  <a href="{{ route('posts.create') }}">
    <h5>create new post</h5>
  </a>

@stop
