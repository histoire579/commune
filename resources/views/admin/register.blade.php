@extends('layouts.mainAuth')

@section('content')
<div id="login-page" >
    <div class="container">
      <form class="form-login" method="POST" action="{{ route('administration.register') }}">
        @csrf
        <h2 class="form-login-heading">sign up now</h2>
        <div class="login-wrap">
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <br>
          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <br>
          <select name="role" id="role" class="form-control">
            <option value="admin">Administrateur</option>
            <option value="super">Super administrateur</option>
          </select>
          <br>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <br>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
          <br>
          <label class="checkbox"style="margin-left: 10px">
            {{--<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} > Remember me
             <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span> --}}
            </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN UP</button>
          
          <div class="login-social-link centered">
            
          </div>
          <div class="registration">
            
          </div>
        </div>
        
      </form>
    </div>
  </div>
@endsection
