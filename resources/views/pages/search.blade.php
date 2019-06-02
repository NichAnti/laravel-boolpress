@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('display-searched') }}" method="get">

    @csrf

    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" id="title" type="text" name="title" placeholder="search title"><br>
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" rows="10" id="content" name="content" placeholder="search content"></textarea><br>
    </div>

    <div class="form-group">
      <label for="author">Author</label>
        <select class="form-control" name="author" id="author">
          <option value="">choose author</option>
          @foreach($posts as $post)
            <option value="{{$post->author}}">{{$post->author}}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group">
      <label for="category">Category</label>
        <select class="form-control" name="category" id="category">
          <option value="">choose category</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
    </div>

    <input class="btn btn-primary btn-lg" type="submit" value="search">

  </form>

@stop
