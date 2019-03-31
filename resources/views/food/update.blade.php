@extends('layouts.master')
@section('title', 'Customer update')

@section('content')
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      Update food
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="POST" action="{{ url('/food/update') }}">
		        <input type="hidden" id="id" name="id" value="{{ $food->id }}" />
            <div class="form-group">
                @csrf
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="food_name" value="{{ $food->name }}"/>
            </div>
            <div class="form-group">
                <label for="price">Description:</label>
                <input type="text" class="form-control" name="food_description" value="{{ $food->description }}"/>
            </div>
            <div class="form-group">
                <label for="quantity">Image URL:</label>
                <input type="text" class="form-control" name="food_image" value="{{ $food->image_url }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
@endsection