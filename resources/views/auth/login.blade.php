@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third">
     <div class="card">
         <header class="card-header">
             <p class="card-header-title">Login</p>
         </header>
         <div class="card-content">
             <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="field {{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="label">Username</label>
                    <div class="control">
                        <input id="username" type="username" class="input" name="username" value="{{ old('username') }}" required autofocus>
                    </div>

                    @if ($errors->has('username'))
                    <p class="help is-danger">{{ $errors->first('username') }}</p>
                    @endif
                </div>


                <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input id="password" type="password" class="input" name="password" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    @if ($errors->has('password'))
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                            Remember Me
                        </label>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-success">Login</button>
                        <a href="{{ route('password.request') }}" class="button is-text">Forgot Your Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
