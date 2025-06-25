@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Produk
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Data Produk</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Playlist</li> --}}
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Data Produk</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
                        <i class="align-middle" data-feather="plus-circle"></i>
                    </button>
                </div>

                {{-- MODAL TAMBAH PRODUK --}}
                <div class="modal fade" id="modalTambahProduk" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body m-3">
                                    <div class="mb-3">
                                        <label class="form-label">NAMA PRODUK <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Nama Produk" value="">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">SKU <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="SKU" value="">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">TOTAL <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Total" value="">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">KOMPOSISI <span class="text-danger">*</span></label>
                                        <textarea name="" class="form-control" id=""></textarea>
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">TANGGAL PRODUKSI <span class="text-danger">*</span></label>
                                        <input type="date" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Total" value="">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">EXPIRED <span class="text-danger">*</span></label>
                                        <input type="DATE" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Total" value="">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">TEMPAT PRODUKSI <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Total" value="">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                
                                    <div class="mb-3">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Berhasil" {{ old('status') == 'Berhasil' ? 'selected' : '' }}>Berhasil</option>
                                            <option value="Gagal" {{ old('status') == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" disabled class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @php
                    $data = [
                        // Data 1–10 (dari sebelumnya)
                        (object)[
                            'id_produk' => 'P001',
                            'nama_produk' => 'Aqua',
                            'sku' => '200 ml',
                            'total' => 2000,
                            'status' => 'Berhasil',
                            'komposisi' => 'Air mineral',
                            'tanggal_produksi' => '2025-04-01',
                            'expired' => '2026-04-01',
                            'tempat_produksi' => 'Bekasi'
                        ],
                        (object)[
                            'id_produk' => 'P002',
                            'nama_produk' => 'Teh Botol',
                            'sku' => '250 ml',
                            'total' => 1500,
                            'status' => 'Berhasil',
                            'komposisi' => 'Teh, gula, air',
                            'tanggal_produksi' => '2025-03-15',
                            'expired' => '2025-09-15',
                            'tempat_produksi' => 'Cikarang'
                        ],
                        (object)[
                            'id_produk' => 'P003',
                            'nama_produk' => 'Sprite',
                            'sku' => '330 ml',
                            'total' => 3000,
                            'status' => 'Pending',
                            'komposisi' => 'Air karbonasi, gula, perisa lemon',
                            'tanggal_produksi' => '2025-04-10',
                            'expired' => '2025-10-10',
                            'tempat_produksi' => 'Bogor'
                        ],
                        (object)[
                            'id_produk' => 'P004',
                            'nama_produk' => 'Coca Cola',
                            'sku' => '500 ml',
                            'total' => 5000,
                            'status' => 'Berhasil',
                            'komposisi' => 'Air karbonasi, gula, kafein',
                            'tanggal_produksi' => '2025-02-28',
                            'expired' => '2025-08-28',
                            'tempat_produksi' => 'Jakarta'
                        ],
                        (object)[
                            'id_produk' => 'P005',
                            'nama_produk' => 'Fanta',
                            'sku' => '600 ml',
                            'total' => 4000,
                            'status' => 'Gagal',
                            'komposisi' => 'Air karbonasi, gula, pewarna merah',
                            'tanggal_produksi' => '2025-01-20',
                            'expired' => '2025-07-20',
                            'tempat_produksi' => 'Surabaya'
                        ],
                        (object)[
                            'id_produk' => 'P006',
                            'nama_produk' => 'Ultramilk',
                            'sku' => '250 ml',
                            'total' => 3200,
                            'status' => 'Berhasil',
                            'komposisi' => 'Susu sapi, vitamin A, D',
                            'tanggal_produksi' => '2025-03-05',
                            'expired' => '2025-09-05',
                            'tempat_produksi' => 'Tangerang'
                        ],
                        (object)[
                            'id_produk' => 'P007',
                            'nama_produk' => 'Mizone',
                            'sku' => '500 ml',
                            'total' => 2800,
                            'status' => 'Pending',
                            'komposisi' => 'Air, elektrolit, perisa buah',
                            'tanggal_produksi' => '2025-04-12',
                            'expired' => '2025-10-12',
                            'tempat_produksi' => 'Bandung'
                        ],
                        (object)[
                            'id_produk' => 'P008',
                            'nama_produk' => 'You C1000',
                            'sku' => '140 ml',
                            'total' => 3500,
                            'status' => 'Berhasil',
                            'komposisi' => 'Vitamin C, air, gula',
                            'tanggal_produksi' => '2025-04-03',
                            'expired' => '2025-10-03',
                            'tempat_produksi' => 'Depok'
                        ],
                        (object)[
                            'id_produk' => 'P009',
                            'nama_produk' => 'Pocari Sweat',
                            'sku' => '330 ml',
                            'total' => 3700,
                            'status' => 'Berhasil',
                            'komposisi' => 'Air, elektrolit, gula',
                            'tanggal_produksi' => '2025-03-20',
                            'expired' => '2025-09-20',
                            'tempat_produksi' => 'Karawang'
                        ],
                        (object)[
                            'id_produk' => 'P010',
                            'nama_produk' => 'Floridina',
                            'sku' => '350 ml',
                            'total' => 2200,
                            'status' => 'Gagal',
                            'komposisi' => 'Jus jeruk, air, gula',
                            'tanggal_produksi' => '2025-02-10',
                            'expired' => '2025-08-10',
                            'tempat_produksi' => 'Malang'
                        ],

                        // Data tambahan 11–20
                        (object)[
                            'id_produk' => 'P011',
                            'nama_produk' => 'Le Minerale',
                            'sku' => '600 ml',
                            'total' => 2400,
                            'status' => 'Berhasil',
                            'komposisi' => 'Air mineral alami',
                            'tanggal_produksi' => '2025-04-05',
                            'expired' => '2026-04-05',
                            'tempat_produksi' => 'Bogor'
                        ],
                        (object)[
                            'id_produk' => 'P012',
                            'nama_produk' => 'Good Day',
                            'sku' => '250 ml',
                            'total' => 3100,
                            'status' => 'Pending',
                            'komposisi' => 'Kopi, gula, susu',
                            'tanggal_produksi' => '2025-03-22',
                            'expired' => '2025-09-22',
                            'tempat_produksi' => 'Cibitung'
                        ],
                        (object)[
                            'id_produk' => 'P013',
                            'nama_produk' => 'Nutriboost',
                            'sku' => '240 ml',
                            'total' => 2900,
                            'status' => 'Berhasil',
                            'komposisi' => 'Susu, vitamin B3, B6, B12',
                            'tanggal_produksi' => '2025-03-30',
                            'expired' => '2025-09-30',
                            'tempat_produksi' => 'Semarang'
                        ],
                        (object)[
                            'id_produk' => 'P014',
                            'nama_produk' => 'Yakult',
                            'sku' => '80 ml',
                            'total' => 4500,
                            'status' => 'Berhasil',
                            'komposisi' => 'Susu fermentasi, bakteri baik',
                            'tanggal_produksi' => '2025-04-14',
                            'expired' => '2025-05-14',
                            'tempat_produksi' => 'Sukabumi'
                        ],
                        (object)[
                            'id_produk' => 'P015',
                            'nama_produk' => 'Indomilk Kids',
                            'sku' => '115 ml',
                            'total' => 2500,
                            'status' => 'Berhasil',
                            'komposisi' => 'Susu UHT, perisa cokelat',
                            'tanggal_produksi' => '2025-02-25',
                            'expired' => '2025-08-25',
                            'tempat_produksi' => 'Purwakarta'
                        ],
                        (object)[
                            'id_produk' => 'P016',
                            'nama_produk' => 'Isoplus',
                            'sku' => '350 ml',
                            'total' => 3600,
                            'status' => 'Pending',
                            'komposisi' => 'Elektrolit, air, perisa kelapa',
                            'tanggal_produksi' => '2025-04-08',
                            'expired' => '2025-10-08',
                            'tempat_produksi' => 'Solo'
                        ],
                        (object)[
                            'id_produk' => 'P017',
                            'nama_produk' => 'Cleo',
                            'sku' => '1500 ml',
                            'total' => 2800,
                            'status' => 'Berhasil',
                            'komposisi' => 'Air murni',
                            'tanggal_produksi' => '2025-03-18',
                            'expired' => '2026-03-18',
                            'tempat_produksi' => 'Yogyakarta'
                        ],
                        (object)[
                            'id_produk' => 'P018',
                            'nama_produk' => 'Teh Gelas',
                            'sku' => '220 ml',
                            'total' => 2300,
                            'status' => 'Gagal',
                            'komposisi' => 'Teh, gula, air',
                            'tanggal_produksi' => '2025-01-12',
                            'expired' => '2025-07-12',
                            'tempat_produksi' => 'Madiun'
                        ],
                        (object)[
                            'id_produk' => 'P019',
                            'nama_produk' => 'Fruit Tea',
                            'sku' => '500 ml',
                            'total' => 3900,
                            'status' => 'Berhasil',
                            'komposisi' => 'Teh, perisa buah, gula',
                            'tanggal_produksi' => '2025-03-10',
                            'expired' => '2025-09-10',
                            'tempat_produksi' => 'Probolinggo'
                        ],
                        (object)[
                            'id_produk' => 'P020',
                            'nama_produk' => 'Bear Brand',
                            'sku' => '189 ml',
                            'total' => 4700,
                            'status' => 'Berhasil',
                            'komposisi' => 'Susu steril 100%',
                            'tanggal_produksi' => '2025-04-16',
                            'expired' => '2026-04-16',
                            'tempat_produksi' => 'Cimahi'
                        ],
                    ];
                @endphp

                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID PRODUK</th>
                                <th style="text-align: center;">NAMA PRODUK</th>
                                <th style="text-align: center;">SKU</th>
                                <th style="text-align: center;">TOTAL</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->nama_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->sku ?? '-' }}</td>
                                    <td style="text-align: center;">{{ number_format($item->total, 0, ',', '.') }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status === 'Berhasil')
                                            <span class="badge bg-success">Berhasil</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $item->status }}</span>
                                        @endif
                                    </td>
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
                                                            <i class="align-middle me-2" data-feather="eye"></i> Lihat
                                                        </a>
                                                        <!-- Tombol Detail -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id_produk }}">
                                                            <i class="ion ion-md-search me-2"></i> Detail
                                                        </a>
                                                        <!-- Tombol Edit -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUpdateProduk{{ $item->id_produk }}">
                                                            <i class="fas fa-pen me-2"></i> Update
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <!-- Form Delete -->
                                                        <form action="" method="POST" class="delete-form d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger delete-btn">
                                                                <i class="fas fa-trash me-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- modal detail -->
                                <div class="modal fade" id="modalDetail{{ $item->id_produk }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <ul class="list-group">
                                                    <li class="list-group-item"><strong>ID Produk:</strong> {{ $item->id_produk }}</li>
                                                    <li class="list-group-item"><strong>Nama Produk:</strong> {{ $item->nama_produk }}</li>
                                                    <li class="list-group-item"><strong>SKU:</strong> {{ $item->sku }}</li>
                                                    <li class="list-group-item"><strong>Komposisi:</strong> {{ $item->komposisi }}</li>
                                                    <li class="list-group-item"><strong>Tanggal Produksi:</strong> {{ \Carbon\Carbon::parse($item->tanggal_produksi)->format('d M Y') }}</li>
                                                    <li class="list-group-item"><strong>Expired:</strong> {{ \Carbon\Carbon::parse($item->expired)->format('d M Y') }}</li>
                                                    <li class="list-group-item"><strong>Tempat Produksi:</strong> {{ $item->tempat_produksi }}</li>
                                                    <li class="list-group-item"><strong>Total:</strong> {{ number_format($item->total, 0, ',', '.') }}</li>
                                                    <li class="list-group-item"><strong>Status:</strong> 
                                                        @if($item->status == 'Berhasil')
                                                            <span class="badge bg-success">{{ $item->status }}</span>
                                                        @elseif($item->status == 'Pending')
                                                            <span class="badge bg-warning text-dark">{{ $item->status }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- MODAL UPDATE PRODUK --}}
                                <div class="modal fade" id="modalUpdateProduk{{ $item->id_produk }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body m-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">NAMA PRODUK <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Nama Produk" value="{{ $item->nama_produk }}">
                                                        @error('nama_modul')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">SKU <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="SKU" value="{{ $item->sku }}">
                                                        @error('nama_modul')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">TOTAL <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Total" value="{{ $item->total }}">
                                                        @error('nama_modul')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                
                                                    <div class="mb-3">
                                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                                                            <option value="">-- Pilih Status --</option>
                                                            <option value="Berhasil" {{ old('status',$item->status) == 'Berhasil' ? 'selected' : '' }}>Berhasil</option>
                                                            <option value="Gagal" {{ old('status',$item->status) == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" disabled class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
