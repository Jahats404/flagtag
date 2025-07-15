@extends('master')

@section('content')
<div class="header">
    <h1 class="header-title">
        Klaim Token
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard Customer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Klaim Token</li>
        </ol>
    </nav>
</div>

@if ($hologram)
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if ($hologram->customer_claim_id || $hologram->status_token == 'Claimed')
                Swal.fire({
                    title: 'Token Sudah Diklaim',
                    text: 'Token ini sudah pernah diklaim sebelumnya. Anda tidak dapat melakukan klaim ulang.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'swal2-rounded swal2-shadow'
                    }
                });
            @elseif ($hologram->status_token == 'Active')
                Swal.fire({
                    title: 'Klaim Token Anda',
                    html: `
                        <p>Selamat! Anda berhak mendapatkan token dari produk:</p>
                        <h4 class="text-primary">{{ $hologram->batchProduk->produk->nama_produk }}</h4>
                        <p>Silakan tekan tombol di bawah untuk klaim token Anda.</p>
                    `,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-check-circle"></i> Klaim Token Sekarang',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'swal2-rounded swal2-shadow'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch("{{ route('c.token.claim', ['kode' => encrypt_id($hologram->kode_hologram)]) }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: data.message,
                                    icon: 'success'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: data.message,
                                    icon: 'error'
                                });
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.fire({
                                title: 'Terjadi Kesalahan',
                                text: 'Silakan coba lagi.',
                                icon: 'error'
                            });
                        });
                    }
                });
            @endif
        });
    </script>
@endif




<div class="row">
    {{-- <div class="d-flex justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 py-3">
                    <h5 class="mb-0"><i class="fas fa-gift me-2"></i> Klaim Token Anda</h5>
                </div>

                <div class="card-body text-center">
                    <p class="fs-5 text-secondary mb-4">
                        Selamat! Anda berhak mendapatkan token dari produk:
                    </p>

                    <h4 class="text-primary mb-3 fw-bold">
                        {{ $hologram->batchProduk->produk->nama_produk }}
                    </h4>

                    <p class="text-muted mb-4">
                        Silakan tekan tombol di bawah untuk melakukan klaim token Anda.
                    </p>

                    <a href="#" class="btn btn-primary btn-lg rounded-pill px-4">
                        <i class="fas fa-check-circle me-2"></i> Klaim Token Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">Total Token Anda: 
                    <span class="badge bg-success">{{ $totalToken ?? 0 }}</span>
                </h5>
            </div>

            <div class="card-body">
                @if ($riwayatScan->isEmpty())
                    <p class="text-muted">Belum ada riwayat scan produk.</p>
                @else
                    <div class="table-responsive">
                        <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    {{-- <th>Kode</th> --}}
                                    <th>Produk</th>
                                    {{-- <th>No. Batch</th> --}}
                                    <th>Lokasi Scan</th>
                                    <th>Waktu Scan</th>
                                    <th>Token</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayatScan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $item->kode_hologram }}</td> --}}
                                        <td>{{ optional($item->batchProduk->produk)->nama_produk ?? '-' }}</td>
                                        {{-- <td>{{ optional($item->batchProduk)->no_batch_produk ?? '-' }}</td> --}}
                                        <td>{{ $item->lokasi_scan ?? '-' }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                        <td>{{ optional($item->batchProduk)->nominal_token ?? 0 }}</td>
                                        {{-- <td style="text-align: center;">
                                            <div class="d-flex justify-content-center gap-2">
                                                <div class="dropdown">
                                                    <a href="#" class="text-body" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="align-middle me-2" data-feather="more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <!-- Tombol Klaim -->
                                                            <a class="dropdown-item" href="">
                                                                <i class="align-middle me-2 fas fa-fw fa-mouse-pointer"></i>Klaim
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('/') }}js/app.js"></script>

<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Fixed Header
			$("#datatables-fixed-header").DataTable({
                responsive: true,
				fixedHeader: true,
				pageLength: 25,
                // scrollX:true,
			});
		});
	</script>

@include('validation.notifications')
@endsection
