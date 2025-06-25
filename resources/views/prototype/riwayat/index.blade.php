@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Riwayat Scan
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Riwayat Scan</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalConnect">Connect Wallet</button>
                </div>

                {{-- MODAL CONNECT --}}
                <div class="modal fade" id="modalConnect" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header justify-content-center">
                                <h5 class="modal-title text-center">Connect Wallet</h5>
                                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <ul class="list-group list-unstyled">
                                    @php
                                        $wallets = [
                                            ['name' => 'WalletConnect', 'icon' => 'walletconnect.png'],
                                            ['name' => 'MetaMask', 'icon' => 'metamask.png'],
                                            ['name' => 'Trust Wallet', 'icon' => 'trustwallet.png'],
                                            ['name' => 'Coin Base', 'icon' => 'coinbase.png'],
                                        ];
                                    @endphp

                                    @foreach ($wallets as $wallet)
                                    <li class="d-flex align-items-center justify-content-between p-2 rounded mb-2 wallet-item" style="transition: 0.3s; cursor: pointer;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('img/wallets/' . $wallet['icon']) }}" alt="{{ $wallet['name'] }}" width="30" class="me-2">
                                            <strong>{{ $wallet['name'] }}</strong>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm">Connect</button>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .wallet-item:hover {
                        background-color: #f0f0f0;
                    }
                </style>

                @php
                    $dataRiwayat = [
                        (object)[ 'id_produk' => 'P001', 'nama_produk' => 'Aqua', 'tanggal' => '2025-05-01', 'nilai' => 1200, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P002', 'nama_produk' => 'Teh Botol Sosro', 'tanggal' => '2025-05-02', 'nilai' => 1350, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P003', 'nama_produk' => 'Fanta', 'tanggal' => '2025-05-03', 'nilai' => 1450, 'status' => 'Pending' ],
                        (object)[ 'id_produk' => 'P004', 'nama_produk' => 'Sprite', 'tanggal' => '2025-05-04', 'nilai' => 1550, 'status' => 'Tidak Aktif' ],
                        (object)[ 'id_produk' => 'P005', 'nama_produk' => 'Coca Cola', 'tanggal' => '2025-05-05', 'nilai' => 1600, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P006', 'nama_produk' => 'Nestle Pure Life', 'tanggal' => '2025-05-06', 'nilai' => 1100, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P007', 'nama_produk' => 'Pocari Sweat', 'tanggal' => '2025-05-07', 'nilai' => 1700, 'status' => 'Pending' ],
                        (object)[ 'id_produk' => 'P008', 'nama_produk' => 'Ultra Milk', 'tanggal' => '2025-05-08', 'nilai' => 1800, 'status' => 'Tidak Aktif' ],
                        (object)[ 'id_produk' => 'P009', 'nama_produk' => 'Indomilk', 'tanggal' => '2025-05-09', 'nilai' => 1900, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P010', 'nama_produk' => 'Frisian Flag', 'tanggal' => '2025-05-10', 'nilai' => 1250, 'status' => 'Pending' ],
                        (object)[ 'id_produk' => 'P011', 'nama_produk' => 'You C1000', 'tanggal' => '2025-05-11', 'nilai' => 1150, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P012', 'nama_produk' => 'Good Day', 'tanggal' => '2025-05-12', 'nilai' => 1300, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P013', 'nama_produk' => 'Le Minerale', 'tanggal' => '2025-05-13', 'nilai' => 1400, 'status' => 'Tidak Aktif' ],
                        (object)[ 'id_produk' => 'P014', 'nama_produk' => 'Floridina', 'tanggal' => '2025-05-14', 'nilai' => 1500, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P015', 'nama_produk' => 'Nu Green Tea', 'tanggal' => '2025-05-15', 'nilai' => 1650, 'status' => 'Pending' ],
                        (object)[ 'id_produk' => 'P016', 'nama_produk' => 'Vit', 'tanggal' => '2025-05-16', 'nilai' => 1000, 'status' => 'Tidak Aktif' ],
                        (object)[ 'id_produk' => 'P017', 'nama_produk' => 'Ale-Ale', 'tanggal' => '2025-05-17', 'nilai' => 950, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P018', 'nama_produk' => 'Mizone', 'tanggal' => '2025-05-18', 'nilai' => 1050, 'status' => 'Aktif' ],
                        (object)[ 'id_produk' => 'P019', 'nama_produk' => 'Hemaviton C1000', 'tanggal' => '2025-05-19', 'nilai' => 1750, 'status' => 'Pending' ],
                        (object)[ 'id_produk' => 'P020', 'nama_produk' => 'Fresh Tea', 'tanggal' => '2025-05-20', 'nilai' => 1600, 'status' => 'Aktif' ],
                    ];
                @endphp



                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID PRODUK</th>
                                <th style="text-align: center;">NAMA PRODUK</th>
                                <th style="text-align: center;">TANGGAL</th>
                                <th style="text-align: center;">NILAI</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataRiwayat as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->nama_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tanggal ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->nilai ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->status ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="align-middle me-2" data-feather="more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <!-- Tombol Lihat -->
                                                        <a class="dropdown-item" href="{{ route('aset.produk') }}">
                                                            <i class="ion ion-ios-send me-2"></i> Klaim
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
