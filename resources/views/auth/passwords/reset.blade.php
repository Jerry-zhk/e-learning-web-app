@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Reset Password</p>
            </header>
            <div class="card-content">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="label">E-Mail Address</label>
                        <div class="control">
                            <input id="email" type="email" class="input" name="email" value="{{ $email or old('email') }}" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="label">Password</label>
                        <div class="control">
                            <input id="password" type="password" class="input" name="password" required>
                        </div>
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="label">Confirm Password</label>
                        <div class="control">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>

                        </div>
                        @if ($errors->has('password_confirmation'))
                            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-primary">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
