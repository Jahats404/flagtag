<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | FLAGSHIIIP</title>
	<meta name="description" content="Registration page for FLAGSHIIIP Monitoring System">
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
			background-color: #e96b00;
		}
		a {
			color: #ff7a00;
		}
		a:hover {
			color: #003f9a;
			text-decoration: underline;
		}
	</style>
</head>

<body class="d-flex align-items-center min-vh-100">

	<main class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="text-center mb-4">
					<img src="{{ asset('img/flagshiiip_logo.png') }}" alt="FLAGSHIIIP Logo" class="img-fluid" width="180">
					<h1 class="h3 mt-3">Create Your Account</h1>
					<p class="text-muted">Register as Customer</p>
				</div>

				<div class="card">
					<div class="card-body p-4">
						<form method="POST" action="{{ route('action.register') }}">
							@csrf

							{{-- Nama Lengkap --}}
							<div class="mb-3">
								<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
								<input type="text" name="nama_lengkap" id="nama_lengkap"
									class="form-control form-control-lg @error('nama_lengkap') is-invalid @enderror"
									value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" required>
								@error('nama_lengkap')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							{{-- Email --}}
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" id="email"
									class="form-control form-control-lg @error('email') is-invalid @enderror"
									value="{{ old('email') }}" placeholder="Masukkan email" required>
								@error('email')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							{{-- Password --}}
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" id="password"
									class="form-control form-control-lg @error('password') is-invalid @enderror"
									placeholder="Masukkan password" required>
								@error('password')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

                            {{-- Konfirmasi Password --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Ulangi password" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

							<div class="text-center">
								<button type="submit" class="btn btn-primary btn-lg w-100">Daftar</button>
							</div>

							<div class="text-center mt-3">
								<small>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></small>
							</div>
						</form>
					</div>
				</div>

				{{-- SweetAlert for errors --}}
				@if ($errors->any())
					<script>
						document.addEventListener("DOMContentLoaded", function () {
							Swal.fire({
								icon: "error",
								title: "Oops!",
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
