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

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="label">E-Mail Address</label>
                        <div class="control">
                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-primary">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
