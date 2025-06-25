@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Batch Produk 
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('bo.produk') }}">Data Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Batch Produk</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">{{ $produk->nama_produk }}</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
                        Tambah Batch <i class="align-middle" data-feather="plus-circle"></i>
                    </button>
                </div>

                {{-- MODAL TAMBAH PRODUK --}}
                <div class="modal fade" id="modalTambahProduk" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Batch Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('bo.produk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body m-3">
                                    <div class="mb-3">
                                        <label class="form-label">NO BATCH PRODUK <span class="text-danger">*</span></label>
                                        <input type="text" name="no_batch_produk" class="form-control @error('no_batch_produk') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('no_batch_produk') }}">
                                        @error('no_batch_produk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">TANGGAL PRODUKSI <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_produksi" class="form-control @error('tanggal_produksi') is-invalid @enderror" placeholder="SKU" value="{{ old('tanggal_produksi') }}">
                                        @error('tanggal_produksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">TANGGAL KADALUARSA <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_kadaluarsa" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" placeholder="SKU" value="{{ old('tanggal_kadaluarsa') }}">
                                        @error('tanggal_kadaluarsa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">TEMPAT PRODUKSI <span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_produksi" class="form-control @error('tempat_produksi') is-invalid @enderror" placeholder="SKU" value="{{ old('tempat_produksi') }}">
                                        @error('tempat_produksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">QUANTITY <span class="text-danger">*</span></label>
                                        <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="SKU" value="{{ old('qty') }}">
                                        @error('qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                {{-- <th style="text-align: center;">ID PRODUK</th> --}}
                                <th style="text-align: center;">PRODUK</th>
                                <th style="text-align: center;">NO BATCH</th>
                                <th style="text-align: center;">TGL PRODUKSI</th>
                                <th style="text-align: center;">TGL KADALUARSA</th>
                                <th style="text-align: center;">TEMPAT PRODUKSI</th>
                                <th style="text-align: center;">QUANTITY</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batchProduk as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    {{-- <td style="text-align: center;">{{ $item->id_batch_produk ?? '-' }}</td> --}}
                                    <td style="text-align: center;">{{ $item->produk->nama_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->no_batch_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tanggal_produksi ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tanggal_kadaluarsa ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tempat_produksi ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->qty ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 'Disetujui')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    {{-- <td style="text-align: center;">{{ number_format($item->total, 0, ',', '.') }}</td> --}}
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="align-middle me-2" data-feather="more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <!-- Tombol Batch -->
                                                        <a class="dropdown-item" href="{{ route('aset.produk') }}">
                                                            <i class="ion ion-ios-filing me-2"></i> Batch
                                                        </a>
                                                        <!-- Tombol Detail -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id_batch_produk }}">
                                                            <i class="ion ion-md-search me-2"></i> Detail
                                                        </a>
                                                        <!-- Tombol Edit -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUpdateProduk{{ $item->id_batch_produk }}">
                                                            <i class="fas fa-pen me-2"></i> Update
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <!-- Form Delete -->
                                                        <form action="{{ route('bo.produk.delete', ['id' => Crypt::encryptString($item->id_batch_produk)]) }}" method="POST" class="delete-form d-inline">
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

                                {{-- MODAL UPDATE PRODUK --}}
                                {{-- <div class="modal fade" id="modalUpdateProduk{{ $item->id_batch_produk }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Perbarui Produk <strong>#{{ $item->id_batch_produk }}</strong></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('bo.produk.update', ['id' => Crypt::encryptString($item->id_batch_produk)]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body m-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">NAMA PRODUK <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('nama_produk',$item->nama_produk) }}">
                                                        @error('nama_produk')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">NOMOR SKU <span class="text-danger">*</span></label>
                                                        <input type="text" name="nomor_sku" class="form-control @error('nomor_sku') is-invalid @enderror" placeholder="SKU" value="{{ old('nomor_sku',$item->nomor_sku) }}">
                                                        @error('nomor_sku')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">KATEGORI PRODUK <span class="text-danger">*</span></label>
                                                        <select class="form-control select2kategoriProdukUpdate @error('kategori_produk') is-invalid @enderror" 
                                                            name="kategori_produk">
                                                            <option value="">-- PILIH KATEGORI --</option>
                                                            <option {{ old('kategori_produk',$item->kategori_produk) == 'Makanan' ? 'selected' : '' }} value="Makanan">Makanan</option>
                                                            <option {{ old('kategori_produk',$item->kategori_produk) == 'Herbal' ? 'selected' : '' }} value="Herbal">Herbal</option>
                                                            <option {{ old('kategori_produk',$item->kategori_produk) == 'Kebersihan' ? 'selected' : '' }} value="Kebersihan">Kebersihan</option>
                                                        </select>
                                                        @error('kategori_produk')
                                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">KOMPOSISI <span class="text-danger">*</span></label>
                                                        <textarea name="komposisi_produk" class="form-control @error('komposisi_produk') is-invalid @enderror" id="komposisi_produk">{{ old('komposisi_produk',$item->komposisi_produk) }}</textarea>
                                                        @error('komposisi_produk')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">DESKRIPSI</label>
                                                        <textarea name="deskripsi_produk" class="form-control @error('deskripsi_produk') is-invalid @enderror" id="deskripsi_produk">{{ old('deskripsi_produk',$item->deskripsi_produk) }}</textarea>
                                                        @error('deskripsi_produk')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert Delete --}}
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


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#datatables-dashboard-traffic").DataTable({
                pageLength: 7,
                lengthChange: false,
                bFilter: false,
                autoWidth: false,
                order: [
                    [1, "desc"]
                ]
            });
        });
    </script>

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


    {{-- SCRIPT SELECT2 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Select2
            $(".select2kategoriProduk").each(function() {
                $(this)
                    .wrap("<div class=\"position-relative\"></div>")
                    .select2({
                        placeholder: "-- Pilih Kategori --",
                        dropdownParent: $(this).parent()
                    });
            });

            // Jika ada error Laravel, tambahkan class is-invalid ke Select2
            if ($(".select2kategoriProduk").hasClass("is-invalid")) {
                $(".select2kategoriProduk").next('.select2-container').addClass("is-invalid");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Select2 setiap kali modal dibuka
            $('div[id^="modalUpdateProduk"]').on('shown.bs.modal', function () {
                $(this).find('.select2kategoriProdukUpdate').each(function () {
                    if (!$(this).hasClass('select2-hidden-accessible')) {
                        $(this).select2({
                            dropdownParent: $(this).closest(".modal"),
                            placeholder: "-- PILIH KATEGORI --",
                            allowClear: true
                        });
                    }
                });
            });

            // Simpan nilai Select2 ke input hidden sebelum submit
            $(".select2kategoriProdukUpdate").on("change", function() {
                let hiddenField = $(this).data("hidden-id");
                $("#" + hiddenField).val($(this).val());
            });
        });
    </script>


    @include('validation.notifications')
@endsection