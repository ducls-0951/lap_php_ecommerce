@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card border-light text-center">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold text-success text-uppercase">{{ __('auth.login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('auth.email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('auth.password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success btn-block">{{ __('auth.login') }}</button>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
