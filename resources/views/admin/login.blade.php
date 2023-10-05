@extends('layouts.mainAuth')

@section('content')
<div id="login-page" >
    <div class="container">
      <form class="form-login" method="POST" action="{{ route('administration.login') }}">
        @csrf
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <br>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <label class="checkbox"style="margin-left: 10px">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} > Remember me
            {{-- <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span> --}}
            </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          
          <div class="login-social-link centered">
            
          </div>
          <div class="registration">
            
          </div>
        </div>
        
      </form>
    </div>
  </div>
@endsection
