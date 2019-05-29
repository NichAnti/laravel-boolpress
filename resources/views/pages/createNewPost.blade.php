@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('posts.store') }}" method="post">

    @csrf

    <label for="title">title</label>
    <input type="text" name="title" placeholder="write title"><br>

    <label for="content">content</label>
    <!-- <input type="text" name="content" placeholder="write content"> -->
    <textarea name="content" rows="8" cols="80" placeholder="write content"></textarea><br>

    <label for="author">author</label>
    <input type="text" name="author" placeholder="write author"><br>

    @foreach($categories as $category)

      <input type="checkbox" name="category" value="{{ $category->id }}"> {{ $category->name }}<br>

    @endforeach

    <input type="submit" value="save new post">

  </form>

@stop
