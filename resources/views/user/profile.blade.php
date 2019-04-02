@extends('layouts.master')
@section('title', 'Profile')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Profile</div>
        <div class="card-body">
          <img src="<?php echo asset("storage/image/$user->avatar")?>" alt="avatar" style="width:100px;height:100px">
          {{ $user->name }}
        </div>
        <a href="{{ route('user.edit')}}">
          <button type="button" class="btn btn-primary">Edit</button>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection