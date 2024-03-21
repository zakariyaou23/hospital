@extends('layouts.auth')
@section('content')
<div class="account-box">
    <form action="/login" method="POST" class="form-signin">
        @csrf
        <div class="account-logo">
            <a href="/"><img src="/apps/assets/img/logo-dark.png" alt=""></a>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group">
            <label>Email</label>
            <input type="text" autofocus="" name="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group text-right">
            <a href="/forgot-password">Forgot your password?</a>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary account-btn">Login</button>
        </div>
        <div class="text-center register-link">
            Don't have an account? <a href="/">Register Now</a>
        </div>
    </form>
</div>
@endsection
