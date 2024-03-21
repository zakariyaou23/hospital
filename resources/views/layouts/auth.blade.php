<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="/apps/assets/img/favicon.ico">
    <title>{{ config('app.name', 'MEDICIO') }}</title>
    <link rel="stylesheet" type="text/css" href="/apps/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/apps/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/apps/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				@yield('content')
			</div>
        </div>
    </div>
    <script src="/apps/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/apps/assets/js/popper.min.js"></script>
    <script src="/apps/assets/js/bootstrap.min.js"></script>
    <script src="/apps/assets/js/app.js"></script>
</body>
</html>
