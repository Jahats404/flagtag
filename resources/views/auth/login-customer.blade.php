<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | FLAGSHIIIP</title>
	<meta name="description" content="Login page for FLAGSHIIIP Monitoring System">
	<meta name="author" content="Tristar">

	<!-- Styles -->
	<link href="{{ asset('css/modern.css') }}" rel="stylesheet">
	<link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

	<!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		body {
		background-color: #e6f0ff;
		}
		.card {
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
			border-radius: 12px;
		}
		.btn-primary {
			background-color: #ff7a00; /* orange */
			border: none;
		}
		.btn-primary:hover {
			background-color: #0050cc;
		}
		a {
			color: #ff7a00; /* orange */
		}
		a:hover {
			color: #003f9a;
			text-decoration: underline;
		}
	</style>
</head>

<body class="theme-blue d-flex align-items-center min-vh-100">

	<main class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="text-center mb-4">
					<img src="{{ asset('img/flagshiiip_logo.png') }}" alt="FLAGSHIIIP Logo" class="img-fluid" width="180">
					<h1 class="h3 mt-3">Welcome Back</h1>
					<p class="text-muted">Please sign in to continue</p>
				</div>

				<div class="card">
					<div class="card-body p-4">
						<form method="POST" action="{{ route('authenticate.customer', ['kode' => $kode]) }}">
							@csrf

							<div class="mb-3">
								<label for="email" class="form-label">Email address</label>
								<input type="email" name="email" id="email"
									class="form-control form-control-lg @error('email') is-invalid @enderror"
									value="{{ old('email') }}" placeholder="you@example.com" required>
								@error('email')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" id="password"
									class="form-control form-control-lg @error('password') is-invalid @enderror"
									placeholder="Enter your password" required>
								@error('password')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="d-flex justify-content-between align-items-center mb-3">
								{{-- <small>
									<a href="#">Forgot password?</a>
								</small> --}}
								<small>
									Don't have an account? <a href="{{ route('register.customer', ['kode' => $kode]) }}">Register here</a>
								</small>
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
							</div>
						</form>
					</div>
				</div>

				@if ($errors->any())
					<script>
						document.addEventListener("DOMContentLoaded", function () {
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "{{ $errors->first() }}",
								confirmButtonColor: '#ff7a00'
							});
						});
					</script>
				@endif

			</div>
		</div>
	</main>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
@include('validation.notifications')
</html>
