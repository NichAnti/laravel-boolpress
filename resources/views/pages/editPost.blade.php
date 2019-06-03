@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('update-post', $post->id) }}" method="post">

    @csrf
    @method('PATCH')

    <div class="form-group">
      <label for="title">Title</label>
      <input id="title" class="form-control" type="text" name="title" value="{{ $post->title }}"><br>
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea id="content" class="form-control" name="content" rows="10">{{ $post->content }}</textarea><br>
    </div>

    <div class="form-group">
      <label for="author">Author</label>
      <input id="author" class="form-control" type="text" name="author" value="{{ $post->author }}"><br>
    </div>

    <div class="form-group">
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
    </div>

    <input class="btn btn-primary btn-lg" type="submit" value="save">

  </form>

@stop
