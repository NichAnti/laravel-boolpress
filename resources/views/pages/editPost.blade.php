@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('posts.update', $post->id) }}" method="post">

    @csrf
    @method('PATCH')

    <label for="title">title</label>
    <input id="title" type="text" name="title" value="{{ $post->title }}"><br>

    <label for="content">content</label>
    <!-- <input type="text" name="content" value="{{ $post->content }}"> -->
    <textarea id="content" name="content" rows="8" cols="80">{{ $post->content }}</textarea><br>

    <label for="author">author</label>
    <input id="author" type="text" name="author" value="{{ $post->author }}"><br>

    <fieldset>

      @foreach($categories as $category)
        <div>

          <input id="{{ $category->name }}" type="checkbox" name="category[]" value="{{ $category->id }}"
          @foreach($post->categories as $postCategory)
            @if ($category->id == $postCategory->id)
              checked
            @endif
          @endforeach
          >
          <label for="{{ $category->name }}">{{ $category->name }}</label>


        </div>
      @endforeach

    </fieldset>


    <input type="submit" value="save">

  </form>

@stop
