@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Pelanggan
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('data.produk') }}">Data Pelanggan</a></li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Data Pelanggan</h5>
                </div>

                @php
                    $dataPelanggan = [
                        (object)[ 'id_pelanggan' => 'PL001', 'nama' => 'Andi Saputra', 'wilayah' => 'Jakarta Selatan', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL002', 'nama' => 'Rina Marlina', 'wilayah' => 'Bandung', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL003', 'nama' => 'Dedi Irawan', 'wilayah' => 'Surabaya', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL004', 'nama' => 'Siti Aisyah', 'wilayah' => 'Depok', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL005', 'nama' => 'Budi Hartono', 'wilayah' => 'Bekasi', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL006', 'nama' => 'Fitri Handayani', 'wilayah' => 'Bogor', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL007', 'nama' => 'Yoga Pratama', 'wilayah' => 'Tangerang', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL008', 'nama' => 'Maria Ulfah', 'wilayah' => 'Semarang', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL009', 'nama' => 'Fajar Sidik', 'wilayah' => 'Yogyakarta', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL010', 'nama' => 'Aulia Rahman', 'wilayah' => 'Palembang', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL011', 'nama' => 'Dian Kartika', 'wilayah' => 'Medan', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL012', 'nama' => 'Rizky Hidayat', 'wilayah' => 'Padang', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL013', 'nama' => 'Winda Permata', 'wilayah' => 'Pekanbaru', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL014', 'nama' => 'Hendra Gunawan', 'wilayah' => 'Makassar', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL015', 'nama' => 'Nurul Fadhilah', 'wilayah' => 'Manado', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL016', 'nama' => 'Tommy Kurniawan', 'wilayah' => 'Balikpapan', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL017', 'nama' => 'Linda Kusuma', 'wilayah' => 'Malang', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL018', 'nama' => 'Agus Salim', 'wilayah' => 'Pontianak', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                        (object)[ 'id_pelanggan' => 'PL019', 'nama' => 'Mega Rahayu', 'wilayah' => 'Cirebon', 'jenis_pelanggan' => 'Pelanggan Baru' ],
                        (object)[ 'id_pelanggan' => 'PL020', 'nama' => 'Arif Setiawan', 'wilayah' => 'Batam', 'jenis_pelanggan' => 'Pelanggan Berulang' ],
                    ];
                @endphp


                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID PELANGGAN</th>
                                <th style="text-align: center;">NAMA</th>
                                <th style="text-align: center;">WILAYAH</th>
                                <th style="text-align: center;">JENIS PELANGGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPelanggan as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_pelanggan ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->nama ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->wilayah ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->jenis_pelanggan == 'Pelanggan Baru')
                                            <span class="badge bg-success">{{ $item->jenis_pelanggan }}</span>
                                        @else
                                            <span class="badge bg-primary">{{ $item->jenis_pelanggan }}</span>
                                            
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
@endsection
