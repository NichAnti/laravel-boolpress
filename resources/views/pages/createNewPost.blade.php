@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('posts.store') }}" method="post">

    @csrf

    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" id="title" type="text" name="title" placeholder="write title"><br>
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" rows="10" id="content" name="content" placeholder="write content"></textarea><br>
    </div>

    <div class="form-group">
      <label for="author">Author</label>
      <input class="form-control" id="author" type="text" name="author" placeholder="write author"><br>
    </div>


    <div class="form-group">
        @foreach($categories as $category)
          <div>
            <input id="{{ $category->name }}" type="checkbox" name="category[]" value="{{ $category->id }}">
            <label for="{{ $category->name }}">{{ $category->name }}</label>
          </div>
        @endforeach
    </div>

    <input class="btn btn-primary btn-lg" type="submit" value="save new post">

  </form>

@stop
