@extends('layouts.mainLayout')

@section('content')

  <div class="row justify-content-center">
    <div class="col-8 border rounded shadow-sm p-5">

      @foreach($post->categories as $category)

        <span class="text-success">{{ $category->name }}</span>

      @endforeach

      <h2 class="text-dark">{{ $post->title }}</h2>
      <p class="text-body">{{ $post->content }} </p>
      <h4 class="text-dark">{{ $post->author }} </h4>


      <small class="text-body">{{ $post->created_at }} </small><br>

      <a role="button" class="btn btn-primary mb-1" href="{{ route('edit-post', $post->id) }}">edit</a><br>

      <form action="{{ route('destroy-post', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="delete"></input>
      </form>

    </div>
  </div>



@stop
