@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('posts.update', $post->id) }}" method="post">

    @csrf
    @method('PATCH')

    <label for="title">title</label>
    <input type="text" name="title" value="{{ $post->title }}"><br>

    <label for="content">content</label>
    <!-- <input type="text" name="content" value="{{ $post->content }}"> -->
    <textarea name="content" rows="8" cols="80">{{ $post->content }}</textarea><br>

    <label for="author">author</label>
    <input type="text" name="author" value="{{ $post->author }}"><br>

    <input type="submit" value="save">

    @foreach($categories as $category)

      <input type="checkbox" name="category" value="{{ $category->id }}"

      @if ($category->id == $post->categories)
        checked
      @endif

      > {{ $category->name }}<br>

    @endforeach

  </form>

@stop
