@extends('layouts.master')
@section('title', 'Customer create')

@section('content')
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      Add food
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
        <form method="POST" action="{{ url('/food/create') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="food_name" required/>
            </div>
            <div class="form-group">
                <label for="price">Description:</label>
                <input type="text" class="form-control" name="food_description" required/>
            </div>
            <div class="form-group">
                <label for="quantity">Image URL:</label>
                <input type="text" class="form-control" name="food_image" required/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
  </div>
@endsection