@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-two-thirds">
        <div class="title has-text-centered">
            <b>OverCode</b>
        </div>

        <div class="intro">
            OverCode is an e-learning platform where you can learn many of the most common programming languages. This integrated platform comprises all the essential features that you will enjoy, allowing you to learn efficiently.
        </div>
        <hr>
        <div>
            <div class="columns">
                <div class="column is-one-two has-text-centered">
                    <div>
                        <img src="{{ asset('img/lecture.png') }}">
                        <p>OverCode designs courses with various levels and focuses. Our lessons start with the most basic one. Or, you can accept a real challenge.</p>
                    </div>
                    <br>
                    <div>
                        <img src="{{ asset('img/discuss.png') }}">
                        <p>Get bored while learning? Or need help? Join our community! You can post all your questions here, and exchange knowledge with each other.</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <img src="{{ asset('img/quiz.png') }}">
                        <p>Worried about memory lost? Attend the quizes! Recall your memories daily and test how much you have absorbed during the lessons.</p> 
                    </div>
                    <br>
                    <div>
                        <img src="{{ asset('img/cert.png') }}">
                        <p>If you are doing good and in the top of our list, you will get a exceptional chance to earn a dicounted or even a free course. Let's strive to be the best!</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="column">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Register</p>
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
                    <div class="field-body m-b-15">
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