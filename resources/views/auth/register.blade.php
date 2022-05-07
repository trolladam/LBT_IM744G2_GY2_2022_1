@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="display-3">
                    {{ __('Sign up') }}
                </h3>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <p class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
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
                        <label for="password_confirmation">{{ __('Password confirmation') }}</label>
                        <input type="password" class="form-control" name="password_confirmation" value="">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input{{ $errors->has('terms') ? ' is-invalid' : '' }}" type="checkbox" value="1" id="terms" name="terms">
                            <label class="form-check-label" for="terms">
                                {{ __('Agree to terms and conditions') }}
                            </label>
                            @if ($errors->has('terms'))
                                <p class="invalid-feedback">
                                    {{ $errors->first('terms') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg">
                            {{ __('Sign up') }}
                        </button>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('login')}}" class="btn btn-link btn-lg">
                            {{ __('Already have an account? Sign in here') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
