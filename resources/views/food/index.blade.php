@extends('layouts.master')
@section('title', 'Customer index')

@section('content')

  <div class="card-columns" style="margin-top: 40px">
    @foreach ($foods as $food)
      <div class="card">
          <a href="{{ route('food.show', $food->id) }}">
            <img class="card-img-top" src="{{ $food->image_url }}" alt="Card image cap">
          </a>
        <div class="card-body">
          <a href="{{ route('food.show', $food->id) }}"><h5 class="card-title">{{ $food->name }}</h5></a>
          <p class="card-text">{{ $food->description }}</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">{{ Carbon\Carbon::parse($food->created_at)->diffForHumans() }}</small>
        </div>
      </div>
    @endforeach
  </div>
  <div class="text-center" style="margin-top: 40px">
    {{ $foods->links() }}
  </div>

@endsection