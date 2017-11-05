@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Login</p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <div class="control">
                            <input type="text" class="input" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="username" class="label">Username</label>
                        <div class="control">
                            <input type="text" class="input" name="username" value="{{ old('username') }}" required>
                            @if ($errors->has('username'))
                                <p class="help is-danger">{{ $errors->first('username') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="email" class="label">E-Mail Address</label>
                        <div class="control">
                            <input type="email" class="input" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <div class="control">
                            <input id="password" type="password" class="input" name="password" required>
                            @if ($errors->has('password'))
                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="password_confirmation" class="label">Comfirm Password</label>
                        <div class="control">
                            <input id="password_confirmation" type="password" class="input" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="field">
                        <label for="age" class="label">Age</label>
                        <div class="control">
                            <input type="number" class="input" name="age" value="{{ old('age') }}" required>
                            @if ($errors->has('age'))
                                <p class="help is-danger">{{ $errors->first('age') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="phone" class="label">Phone</label>
                        <div class="control">
                            <input type="text" class="input" name="phone" value="{{ old('phone') }}" required>
                            @if ($errors->has('phone'))
                                <p class="help is-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-success">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
