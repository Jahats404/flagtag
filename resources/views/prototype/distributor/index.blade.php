@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Distributor
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('data.produk') }}">Data Distributor</a></li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Data Distributor</h5>
                </div>

                @php
                    $dataDistributor = [
                        (object)[ 'id_distributor' => 'D001', 'nama' => 'PT Sumber Rejeki', 'alamat' => 'Jl. Merdeka No. 12', 'wilayah' => 'Jakarta Pusat' ],
                        (object)[ 'id_distributor' => 'D002', 'nama' => 'CV Tirta Abadi', 'alamat' => 'Jl. Ahmad Yani No. 5', 'wilayah' => 'Bandung' ],
                        (object)[ 'id_distributor' => 'D003', 'nama' => 'PT Makmur Sentosa', 'alamat' => 'Jl. Sudirman No. 45', 'wilayah' => 'Surabaya' ],
                        (object)[ 'id_distributor' => 'D004', 'nama' => 'CV Sinar Terang', 'alamat' => 'Jl. Kartini No. 33', 'wilayah' => 'Medan' ],
                        (object)[ 'id_distributor' => 'D005', 'nama' => 'PT Bumi Jaya', 'alamat' => 'Jl. Asia Afrika No. 9', 'wilayah' => 'Jakarta Selatan' ],
                        (object)[ 'id_distributor' => 'D006', 'nama' => 'CV Cahaya Timur', 'alamat' => 'Jl. Pemuda No. 88', 'wilayah' => 'Semarang' ],
                        (object)[ 'id_distributor' => 'D007', 'nama' => 'PT Lestari Bersama', 'alamat' => 'Jl. Diponegoro No. 100', 'wilayah' => 'Yogyakarta' ],
                        (object)[ 'id_distributor' => 'D008', 'nama' => 'CV Sentosa Makmur', 'alamat' => 'Jl. Gajah Mada No. 20', 'wilayah' => 'Bekasi' ],
                        (object)[ 'id_distributor' => 'D009', 'nama' => 'PT Amanah Jaya', 'alamat' => 'Jl. Veteran No. 56', 'wilayah' => 'Depok' ],
                        (object)[ 'id_distributor' => 'D010', 'nama' => 'CV Mulia Sejahtera', 'alamat' => 'Jl. MT Haryono No. 77', 'wilayah' => 'Bogor' ],
                        (object)[ 'id_distributor' => 'D011', 'nama' => 'PT Sahabat Niaga', 'alamat' => 'Jl. Imam Bonjol No. 15', 'wilayah' => 'Palembang' ],
                        (object)[ 'id_distributor' => 'D012', 'nama' => 'CV Bina Karya', 'alamat' => 'Jl. Kenanga No. 3', 'wilayah' => 'Tangerang' ],
                        (object)[ 'id_distributor' => 'D013', 'nama' => 'PT Surya Nusantara', 'alamat' => 'Jl. Melati No. 8', 'wilayah' => 'Makassar' ],
                        (object)[ 'id_distributor' => 'D014', 'nama' => 'CV Utama Mandiri', 'alamat' => 'Jl. K.H. Hasyim Ashari No. 12', 'wilayah' => 'Cirebon' ],
                        (object)[ 'id_distributor' => 'D015', 'nama' => 'PT Berkah Abadi', 'alamat' => 'Jl. Wijaya Kusuma No. 45', 'wilayah' => 'Batam' ],
                        (object)[ 'id_distributor' => 'D016', 'nama' => 'CV Inti Karya', 'alamat' => 'Jl. Mawar No. 27', 'wilayah' => 'Balikpapan' ],
                        (object)[ 'id_distributor' => 'D017', 'nama' => 'PT Samudera Niaga', 'alamat' => 'Jl. Cempaka Putih No. 30', 'wilayah' => 'Manado' ],
                        (object)[ 'id_distributor' => 'D018', 'nama' => 'CV Mitra Sejati', 'alamat' => 'Jl. Sutomo No. 17', 'wilayah' => 'Pontianak' ],
                        (object)[ 'id_distributor' => 'D019', 'nama' => 'PT Jaya Persada', 'alamat' => 'Jl. Pahlawan No. 21', 'wilayah' => 'Padang' ],
                        (object)[ 'id_distributor' => 'D020', 'nama' => 'CV Harapan Baru', 'alamat' => 'Jl. Puspa Indah No. 66', 'wilayah' => 'Pekanbaru' ],
                    ];
                @endphp



                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID DISTRIBUTOR</th>
                                <th style="text-align: center;">NAMA</th>
                                <th style="text-align: center;">ALAMAT</th>
                                <th style="text-align: center;">WILAYAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataDistributor as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_distributor ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->nama ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->alamat ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->wilayah ?? '-' }}</td>
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
