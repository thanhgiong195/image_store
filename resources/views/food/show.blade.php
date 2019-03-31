@extends('layouts.master')
@section('title', 'Customer show')

@section('content')
<div>
  <div class="card bg-dark text-white">
    <img class="card-img" src="{{ $food->image_url }}" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title">{{ $food->name }}</h5>
      <p class="card-text">{{ $food->description }}</p>
      <p class="card-text">Last updated 3 mins ago</p>
    </div>
  </div>
  <hr>
  
  <a href="{{ url('food/') }}/{{ $food->id }}/edit"><button class="btn btn-warning">Edit</button></a>
  <a href="{{ url('food/') }}/{{ $food->id }}/delete"><button class="btn btn-warning">Delete</button></a>
</div>


@endsection