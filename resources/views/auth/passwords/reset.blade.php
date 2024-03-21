@extends('layouts.auth')
@section('content')
<div class="account-box">
    <form action="{{ route('password.update') }}" method="POST" class="form-signin">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <div class="account-logo">
            <a href="/"><img src="/apps/assets/img/logo-dark.png" alt=""></a>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ request()->get('email') ?? old('email') }}" readonly>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="text" name="password_confirmation" class="form-control  @error('password') is-invalid @enderror">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary account-btn">Reset Password</button>
        </div>
        <div class="text-center register-link">
            <a href="/">Go back to login</a>
        </div>
    </form>
</div>
@endsection
