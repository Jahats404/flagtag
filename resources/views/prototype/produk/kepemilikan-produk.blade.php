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
                    $dataKepemilikan = [
                        (object)['id_aset' => 'A001', 'tanggal' => '2025-05-01', 'id_pelanggan' => 'P001', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A002', 'tanggal' => '2025-05-02', 'id_pelanggan' => 'P002', 'status' => 'Belum'],
                        (object)['id_aset' => 'A003', 'tanggal' => '2025-05-03', 'id_pelanggan' => 'P003', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A004', 'tanggal' => '2025-05-04', 'id_pelanggan' => 'P004', 'status' => 'Belum'],
                        (object)['id_aset' => 'A005', 'tanggal' => '2025-05-05', 'id_pelanggan' => 'P005', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A006', 'tanggal' => '2025-05-06', 'id_pelanggan' => 'P006', 'status' => 'Belum'],
                        (object)['id_aset' => 'A007', 'tanggal' => '2025-05-07', 'id_pelanggan' => 'P007', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A008', 'tanggal' => '2025-05-08', 'id_pelanggan' => 'P008', 'status' => 'Belum'],
                        (object)['id_aset' => 'A009', 'tanggal' => '2025-05-09', 'id_pelanggan' => 'P009', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A010', 'tanggal' => '2025-05-10', 'id_pelanggan' => 'P010', 'status' => 'Belum'],

                        (object)['id_aset' => 'A011', 'tanggal' => '2025-05-11', 'id_pelanggan' => 'P011', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A012', 'tanggal' => '2025-05-12', 'id_pelanggan' => 'P012', 'status' => 'Belum'],
                        (object)['id_aset' => 'A013', 'tanggal' => '2025-05-13', 'id_pelanggan' => 'P013', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A014', 'tanggal' => '2025-05-14', 'id_pelanggan' => 'P014', 'status' => 'Belum'],
                        (object)['id_aset' => 'A015', 'tanggal' => '2025-05-15', 'id_pelanggan' => 'P015', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A016', 'tanggal' => '2025-05-16', 'id_pelanggan' => 'P016', 'status' => 'Belum'],
                        (object)['id_aset' => 'A017', 'tanggal' => '2025-05-17', 'id_pelanggan' => 'P017', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A018', 'tanggal' => '2025-05-18', 'id_pelanggan' => 'P018', 'status' => 'Belum'],
                        (object)['id_aset' => 'A019', 'tanggal' => '2025-05-19', 'id_pelanggan' => 'P019', 'status' => 'Berhasil'],
                        (object)['id_aset' => 'A020', 'tanggal' => '2025-05-20', 'id_pelanggan' => 'P020', 'status' => 'Belum'],
                    ];
                @endphp


                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID ASET</th>
                                <th style="text-align: center;">TANGGAL</th>
                                <th style="text-align: center;">ID PELANGGAN</th>
                                <th style="text-align: center;">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKepemilikan as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_aset ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tanggal ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->id_pelanggan ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 'Berhasil')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @else
                                            <span class="badge bg-primary">{{ $item->status }}</span>
                                            
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
