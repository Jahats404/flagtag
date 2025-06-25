@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Produk
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('data.produk') }}">Data Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Aset Produk</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Aset Produk</h5>
                </div>

                @php
                    $dataAset = [
                        (object)['id_aset' => 'A001', 'barcode' => 'BR-10001', 'nilai' => 2500000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A002', 'barcode' => 'BR-10002', 'nilai' => 1800000, 'claim' => 'Belum'],
                        (object)['id_aset' => 'A003', 'barcode' => 'BR-10003', 'nilai' => 3200000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A004', 'barcode' => 'BR-10004', 'nilai' => 950000,  'claim' => 'Belum'],
                        (object)['id_aset' => 'A005', 'barcode' => 'BR-10005', 'nilai' => 4000000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A006', 'barcode' => 'BR-10006', 'nilai' => 2100000, 'claim' => 'Belum'],
                        (object)['id_aset' => 'A007', 'barcode' => 'BR-10007', 'nilai' => 1650000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A008', 'barcode' => 'BR-10008', 'nilai' => 2750000, 'claim' => 'Belum'],
                        (object)['id_aset' => 'A009', 'barcode' => 'BR-10009', 'nilai' => 3100000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A010', 'barcode' => 'BR-10010', 'nilai' => 500000,  'claim' => 'Belum'],

                        // Tambahan 10 data lagi
                        (object)['id_aset' => 'A011', 'barcode' => 'BR-10011', 'nilai' => 1200000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A012', 'barcode' => 'BR-10012', 'nilai' => 890000,  'claim' => 'Belum'],
                        (object)['id_aset' => 'A013', 'barcode' => 'BR-10013', 'nilai' => 1500000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A014', 'barcode' => 'BR-10014', 'nilai' => 3700000, 'claim' => 'Belum'],
                        (object)['id_aset' => 'A015', 'barcode' => 'BR-10015', 'nilai' => 2650000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A016', 'barcode' => 'BR-10016', 'nilai' => 800000,  'claim' => 'Belum'],
                        (object)['id_aset' => 'A017', 'barcode' => 'BR-10017', 'nilai' => 2250000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A018', 'barcode' => 'BR-10018', 'nilai' => 1400000, 'claim' => 'Belum'],
                        (object)['id_aset' => 'A019', 'barcode' => 'BR-10019', 'nilai' => 4300000, 'claim' => 'Terclaim'],
                        (object)['id_aset' => 'A020', 'barcode' => 'BR-10020', 'nilai' => 1900000, 'claim' => 'Belum'],
                    ];
                @endphp


                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID ASET</th>
                                <th style="text-align: center;">BARCODE</th>
                                <th style="text-align: center;">NILAI</th>
                                <th style="text-align: center;">CLAIM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAset as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_aset ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->barcode ?? '-' }}</td>
                                    <td style="text-align: center;">{{ 'Rp. ' . number_format($item->nilai, 0, ',', '.') }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->claim == 'Terclaim')
                                            <span class="badge bg-success">{{ $item->claim }}</span>
                                        @else
                                            <span class="badge bg-primary">{{ $item->claim }}</span>
                                            
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pilih semua tombol dengan kelas delete-btn
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah pengiriman form langsung
    
                const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik
    
                Swal.fire({
                    title: 'Apakah data ini akan dihapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Kirim form jika pengguna mengonfirmasi
                    }
                });
            });
        });
    </script>


    <script src="{{ asset('/') }}js/app.js"></script>
    {{-- SCRIPT SECTION --}}
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

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                title: 'Pembayaran Diperlukan',
                html: `
                    <p>Untuk melanjutkan, Anda perlu melakukan pembayaran sebesar:</p>
                    <h2><strong>Rp. 1.500.000.000</strong></h2>
                    <hr>
                    <p><strong>Metode Pembayaran:</strong></p>
                    <ul style="text-align: left;">
                        <li>Bank BCA - 1234567890 a.n. PT Contoh Perusahaan</li>
                        <li>QRIS - <em>(scan melalui aplikasi e-wallet)</em></li>
                    </ul>
                    <p>Setelah melakukan pembayaran, harap konfirmasi ke admin.</p>
                `,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Bayar Sekarang',
                cancelButtonText: 'Nanti Saja'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan ke halaman pembayaran jika ada
                    window.location.href = "{{ route('aset.produk') }}"; // Ganti dengan rute yang sesuai
                }
            });
        });
    </script> --}}

@endsection
