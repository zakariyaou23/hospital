<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="/apps/assets/img/favicon.ico">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="/apps/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/apps/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/apps/assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="/apps/assets/js/html5shiv.min.js"></script>
		<script src="/apps/assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="/login" method="POST" class="form-signin">
                        @csrf
						<div class="account-logo">
                            <a href="/"><img src="/apps/assets/img/logo-dark.png" alt=""></a>
                        </div>
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
			</div>
        </div>
    </div>
    <script src="/apps/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/apps/assets/js/popper.min.js"></script>
    <script src="/apps/assets/js/bootstrap.min.js"></script>
    <script src="/apps/assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>
