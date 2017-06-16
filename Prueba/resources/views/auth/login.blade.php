@extends('layouts.index')

@section('content')
  <div class="hero-body">
     <div class="container">
       <div class="columns is-vcentered">
         <div class="column is-4 is-offset-4">
           <h1 class="title">
             Login
           </h1>
              <div class="box">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="label">E-Mail Address</label>

                            <div class="field">
                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label">Password</label>

                            <div class="field">
                                <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                              </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="button is-primary">
                                    Login
                            </button>
                        </div>
                    </form>
              </div>
        </div>
      </div>
    </div>
  </div>
@endsection
