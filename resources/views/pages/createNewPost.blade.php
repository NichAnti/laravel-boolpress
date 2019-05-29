@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('posts.store') }}" method="post">

    @csrf

    <label for="title">title</label>
    <input id="title" type="text" name="title" placeholder="write title"><br>

    <label for="content">content</label>
    <textarea id="content" name="content" rows="8" cols="80" placeholder="write content"></textarea><br>

    <label for="author">author</label>
    <input id="author" type="text" name="author" placeholder="write author"><br>

    <fieldset>

      @foreach($categories as $category)
        <div>
          <input id="{{ $category->name }}" type="checkbox" name="category[]" value="{{ $category->id }}">
          <label for="{{ $category->name }}">{{ $category->name }}</label>
        </div>
      @endforeach

    </fieldset>

    <input type="submit" value="save new post">

  </form>

@stop
