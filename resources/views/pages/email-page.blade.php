@extends('layouts.mainLayout')

@section('content')

  <form action="{{ route('send-mail') }}" method="post">

    @csrf
    @method('POST')

    <div class="form-group">
      <label for="title">Title</label>
      <input id="title" class="form-control" type="text" name="title">
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea id="content" class="form-control" name="content" rows="10"></textarea>
    </div>

    <input class="btn btn-primary" type="submit" value="send email">

  </form>

@stop
