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
        <p class="card-text small">{{ Carbon\Carbon::parse($food->created_at)->diffForHumans() }} {{ trans('food.by') }} {{ $auth_food->name }}</p>
      </div>
    </div>
    <div style="margin-top:15px;">
      {{ trans('food.cmtLike') }}: {{ $countlike }}
      <form method="post" action="{{ route('food.like') }}">
        @csrf
        <input type="hidden" name="food_id" value="{{ $food->id }}" />
        <button type="submit" class="like-btn"><i class="fas fa-thumbs-up @if ($checkLike)active @endif"></i></button>
      </form>
    </div>
  </div>
  <div class="col-md-4">
    <h3>{{ trans('food.comment') }}:</h3>
    @foreach($food->comments as $comment)
    <div class="display-comment">
      <strong>{{ $comment->user->name }}</strong>
      <p>{{ $comment->body }}</p>
    </div>
    @endforeach
    <form method="post" action="{{ route('comment.add') }}">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="{{ trans('food.writeComment') }}" name="cmt_body" value="{{ $food->body }}">
        <input type="hidden" name="food_id" value="{{ $food->id }}" />
        <div class="input-group-append">
          <input class="btn btn-primary" type="submit" value="{{ trans('food.addcmt') }}" id="add-comment"/>
        </div>
      </div>
    </form>
  </div>
</div>

<hr>

@if (Auth::user()->id == $food->user_id)
  <a href="{{ route('food.edit', $food->id) }}"><button class="btn btn-primary">{{ trans('food.edit') }}</button></a>
  <a href="{{ route('food.delete', $food->id) }}"><button class="btn btn-warning">{{ trans('food.delete') }}</button></a>
@endif

<style>
  .fa-thumbs-up.active {
    color: blue;
  }

  .like-btn {
    background: transparent;
    border: none;
    outline: none;
  }
  .like-btn:hover {
    cursor: pointer;
    color: blue;
  }
  .like-btn:focus {
    outline: none;
  }
</style>
@endsection