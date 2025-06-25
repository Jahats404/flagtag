<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | FLAGSHIIIP</title>
	<link href="{{ asset('css/modern.css') }}" rel="stylesheet">
	<link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		body {
			background-color: #e6f0ff;
		}
		.card-container {
			perspective: 1000px;
		}
		.card-flip {
			width: 100%;
			transition: transform 0.8s;
			transform-style: preserve-3d;
			position: relative;
			min-height: 400px;
		}
		.card-flip .side {
			position: absolute;
			width: 100%;
			backface-visibility: hidden;
			top: 0;
			left: 0;
		}
		.card-flip .back {
			transform: rotateY(180deg);
		}
		.flipped {
			transform: rotateY(180deg);
		}
		.card {
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
			border-radius: 12px;
		}
		.btn-primary {
			background-color: #ff7a00;
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
<main class="container pb-5"> <!-- Tambahkan padding-bottom -->
	<div class="row justify-content-center">
		<div class="col-md-8 col-lg-6 col-xl-5">
			<div class="text-center mb-4">
				<img src="{{ asset('img/flagshiiip_logo.png') }}" alt="FLAGSHIIIP Logo" class="img-fluid" width="180">
				<h1 class="h3 mt-3">Register Your Account</h1>
			</div>

			<!-- Switch Role -->
			<div class="text-center mb-3">
				<div class="btn-group" role="group">
					<input type="radio" class="btn-check" name="role_switch" id="brand" checked autocomplete="off">
					<label class="btn btn-outline-primary" for="brand">Register as Brand Owner</label>

					<input type="radio" class="btn-check" name="role_switch" id="customer" autocomplete="off">
					<label class="btn btn-outline-primary" for="customer">Register as Customer</label>
				</div>
			</div>

			<!-- Card Container -->
			<div class="card-container mb-3">
				<div id="cardFlip" class="card-flip">

					<!-- Front Side - Brand Owner -->
					<div class="side front">
						<div class="card">
							<div class="card-body p-4">
								<form method="POST">
									@csrf
									<div class="mb-3">
										<label>Nama Perusahaan</label>
										<input class="form-control form-control-lg @error('nama_perusahaan') is-invalid @enderror" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" required>
										@error('nama_perusahaan')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="mb-3">
										<label>Nama Lengkap</label>
										<input class="form-control form-control-lg @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
										@error('nama_lengkap')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="mb-3">
										<label>Email</label>
										<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="you@example.com" required>
										@error('email')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="mb-3">
										<label>Password</label>
										<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Masukkan password" required>
										@error('password')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="text-center mt-3">
										<button type="submit" class="btn btn-primary btn-lg w-100">Daftar Brand Owner</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Back Side - Customer -->
					<div class="side back">
						<div class="card">
							<div class="card-body p-4">
								<form method="POST">
									@csrf
									<div class="mb-3">
										<label>Nama Lengkap</label>
										<input class="form-control form-control-lg @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
										@error('nama_lengkap')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="mb-3">
										<label>Email</label>
										<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="you@example.com" required>
										@error('email')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="mb-3">
										<label>Password</label>
										<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Masukkan password" required>
										@error('password')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="text-center mt-3">
										<button type="submit" class="btn btn-primary btn-lg w-100">Daftar Customer</button>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div> <!-- end card-flip -->
			</div>

			<!-- Sudah punya akun? -->
			<div class="text-center mt-3">
				<small>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></small>
			</div>
		</div>
	</div>
</main>

<script>
	const flipCard = document.getElementById('cardFlip');
	const brandRadio = document.getElementById('brand');
	const customerRadio = document.getElementById('customer');

	brandRadio.addEventListener('change', () => {
		flipCard.classList.remove('flipped');
	});
	customerRadio.addEventListener('change', () => {
		flipCard.classList.add('flipped');
	});
</script>

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

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
