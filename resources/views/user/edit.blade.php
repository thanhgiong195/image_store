@extends('layouts.master')
@section('title', 'Profile')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit profile') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row f-avatar">
                            <img src="<?php echo asset("storage/image/$user->avatar")?>" alt="avatar" id="myAvatar">
                            <label class="txt-change">Change avatar</label>
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" style="opacity:0">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}"  required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ $user->email }}"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#myAvatar')
            .attr('src', e.target.result)
            .width(150)
            .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
  }

  $("#myAvatar").click(function () {
    $("#avatarFile").trigger('click');
  });

  $(".txt-change").click(function () {
    $("#avatarFile").trigger('click');
  });
</script>

<style>
  #myAvatar {
    width:150px;
    height:150px;
    margin:auto;
    background-color: antiquewhite;
    border-radius: 50%;
  }

  #myAvatar:hover {
    cursor: pointer;
  }

  .f-avatar {
    position: relative;
  }

  .f-avatar:hover .txt-change {
    opacity: 1;
  }

  .txt-change {
    cursor: pointer;
    opacity: 0;
    position: absolute;
    left: 50%;
    bottom: 40px;
    transform: translateX(-50%);
    color: #fff;
    background-color: cornflowerblue;
    border-radius: 10px;
    font-size: 11px;
    padding: 0 6px;
    transition: 0.3s all;
  }
</style>
@endsection