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
      {{ trans('food.add') }}
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
                <label for="name">{{ trans('food.name') }}:</label>
                <input type="text" class="form-control" name="food_name"/>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('food.description') }}:</label>
                <input type="text" class="form-control" name="food_description"/>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('food.imageUrl') }}:</label>
                <input type="text" class="form-control" name="food_image"/>
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('food.add') }}</button>
        </form>
    </div>
  </div>
@endsection