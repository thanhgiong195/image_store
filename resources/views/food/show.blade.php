@extends('layouts.master')
@section('title', 'Customer show')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card bg-dark text-white">
      <img class="card-img" src="{{ $food->image_url }}" alt="Card image">
      <div class="card-img-overlay" style="top:auto !important">
        <h5 class="card-title">{{ $food->name }}</h5>
        <p class="card-text">{{ $food->description }}</p>
        <p class="card-text small">Last updated 3 mins ago</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <h3>Comment:</h3>
    @foreach($food->comments as $comment)
    <div class="display-comment">
      <strong>{{ $comment->user->name }}</strong>
      <p>{{ $comment->body }}</p>
    </div>
    @endforeach
    <form method="post" action="{{ route('comment.add') }}">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Write a comment here..." aria-label="Recipient's username"
          aria-describedby="basic-addon2" name="cmt_body" value="{{ $food->body }}"">
        <input type="hidden" name="food_id" value="{{ $food->id }}" />
        <div class="input-group-append">
          <input class="btn btn-primary" type="submit" value="Add" />
        </div>
      </div>
    </form>
  </div>
</div>

<hr>

<a href="{{ url('food/') }}/{{ $food->id }}/edit"><button class="btn btn-primary">Edit</button></a>
<a href="{{ url('food/') }}/{{ $food->id }}/delete"><button class="btn btn-warning">Delete</button></a>
@endsection