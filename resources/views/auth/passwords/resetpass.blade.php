@extends('layouts.index-login')

@section('contents')
<style>
    .cust-col{
        margin-top: 40px;
        padding-top: 80px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 cust-col">
            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="/img/FM LOGO 3.png" alt="">
                </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row mt-3">
                            <label for="email" class="col-md col-form-label  ">{{ __('Email Address') }}</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="password" class="col-md col-form-label ">{{ __('Password') }}</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="password-confirm" class="col-md col-form-label ">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col "></div>
                            <div class="col-md-6  text-end">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
