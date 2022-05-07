@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="display-3">
                    {{ __('Sign in') }}
                </h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email">{{ __('Email address') }}</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="">
                        @if ($errors->has('password'))
                            <p class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg">
                            {{ __('Sign in') }}
                        </button>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('register')}}" class="btn btn-link btn-lg">
                            {{ __("Don't have an account? Sign up here") }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center mt-3">
            <a href="#">
                {{ __('Forgotten password') }}
            </a>
        </p>
    </div>
</div>
@endsection
