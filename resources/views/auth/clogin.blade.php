@extends('layout.login')


@section('localscript')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('/admin/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('/admin/plugins/iCheck/square/blue.css') }}">
@endsection



@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Sistem Perakam Waktu Berelektronik</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log Masuk</p>

    <form action="/myauth/login" method="post">
      <div class="form-group has-feedback">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="user_username" class="form-control" placeholder="ID Pengguna">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="user_pwd" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!--<div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection













@section('xcontent')

<form method="POST" action="/custom_auth/login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="username" value="{{ old('username') }}">
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>

@endsection
