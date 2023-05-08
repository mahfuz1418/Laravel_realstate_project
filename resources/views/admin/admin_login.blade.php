<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Login Page</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

  <style>
    .auth-side-wrapper-img{
        width: 100%;
        height: 100%;
        background-size: cover;
        background-image: url({{ asset('upload/side_pic.jpg') }});
    }
  </style>
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="mx-0 row w-100 auth-page">
					<div class="mx-auto col-md-8 col-xl-6">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper-img">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="px-4 py-5 auth-form-wrapper">
                    <a href="#" class="mb-2 noble-ui-logo logo-light d-block">Real<span>Estate</span></a>
                    <h5 class="mb-4 text-muted fw-normal">Welcome back! Log in to your account.</h5>

                    <form class="forms-sample" action="{{ route('login') }}" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label for="login" class="form-label">Email/ Name/ Phone</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter Your account">
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" autocomplete="current-password" placeholder="Password" name="password" >
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">
                          Remember me
                        </label>
                      </div>
                      <div>
                        <button type="submit" class="mb-2 btn btn-outline-primary btn-icon-text mb-md-0">
                          Login
                        </button>
                      </div>
                      <a href="register.html" class="mt-3 d-block text-muted">Not a user? Sign up</a>
                    </form>

                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
    
	<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>