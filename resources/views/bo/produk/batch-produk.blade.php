@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Batch Produk <span class="text-uppercase">{{ $produk->nama_produk }}</span>
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
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBatch">
                        Tambah Batch <i class="align-middle" data-feather="plus-circle"></i>
                    </button>
                </div>

                {{-- MODAL TAMBAH PRODUK --}}
                <style>
                    .modal-header {
                        background: linear-gradient(90deg, #ff7a00, #ed5205); /* gradient orange */
                        color: #fff;
                        border-bottom: none;
                        padding: 1rem 1.5rem;
                        border-top-left-radius: 12px;
                        border-top-right-radius: 12px;
                    }

                    .modal-title {
                        font-weight: 600;
                        font-size: 1.25rem;
                    }

                    .modal-content {
                        border-radius: 12px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                        border: none;
                    }

                    .modal-body {
                        padding: 2rem;
                    }

                    .modal-footer {
                        padding: 1rem 2rem;
                        background-color: #f9f9f9;
                        border-top: 1px solid #eee;
                    }

                    .form-label {
                        font-weight: 600;
                        color: #333;
                    }

                    .form-control {
                        border-radius: 8px;
                        padding: 0.75rem;
                    }

                    .btn-primary {
                        background-color: #ff7a00;
                        border: none;
                        font-weight: 600;
                        transition: 0.3s;
                    }

                    .btn-primary:hover {
                        background-color: #cc6200;
                    }

                    .btn-secondary {
                        font-weight: 600;
                    }
                </style>

                <div class="modal fade" id="modalTambahBatch" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-box-seam me-2"></i>Tambah Batch Produk</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('bo.batch.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk->id_produk }}">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">No Batch Produk <span class="text-danger">*</span></label>
                                        <input type="text" name="no_batch_produk" class="form-control @error('no_batch_produk') is-invalid @enderror" placeholder="Masukkan no batch produk" value="{{ old('no_batch_produk') }}">
                                        @error('no_batch_produk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Produksi <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_produksi" class="form-control @error('tanggal_produksi') is-invalid @enderror" value="{{ old('tanggal_produksi') }}">
                                        @error('tanggal_produksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kadaluarsa <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_kadaluarsa" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" value="{{ old('tanggal_kadaluarsa') }}">
                                        @error('tanggal_kadaluarsa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tempat Produksi <span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_produksi" class="form-control @error('tempat_produksi') is-invalid @enderror" placeholder="Masukkan lokasi produksi" value="{{ old('tempat_produksi') }}">
                                        @error('tempat_produksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Produk (Quantity) <span class="text-danger">*</span></label>
                                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan jumlah produk" value="{{ old('quantity') }}">
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nominal Token</label>
                                        <input type="number" name="nominal_token" class="form-control @error('nominal_token') is-invalid @enderror" placeholder="Masukkan jumlah produk" value="{{ old('nominal_token') }}">
                                        @error('nominal_token')
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
                                <th style="text-align: center;">NO BATCH</th>
                                <th style="text-align: center;">TGL PRODUKSI</th>
                                <th style="text-align: center;">TGL KADALUARSA</th>
                                <th style="text-align: center;">TEMPAT PRODUKSI</th>
                                <th style="text-align: center;">QUANTITY</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batchProduk as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->no_batch_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tanggal_produksi ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tanggal_kadaluarsa ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->tempat_produksi ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->quantity ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 'Disetujui')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Pending')
                                            <span class="badge bg-info">{{ $item->status }}</span>
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
                                                        <!-- Tombol Detail -->
                                                        <a class="dropdown-item" href="{{ route('bo.batch.detail', ['id' => encrypt_id($item->id_batch_produk)]) }}">
                                                            <i class="ion ion-md-search me-2"></i> Detail
                                                        </a>
                                                        <!-- Tombol Edit -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUpdateBatch{{ $item->id_batch_produk }}">
                                                            <i class="fas fa-pen me-2"></i> Update
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <!-- Form Delete -->
                                                        <form action="{{ route('bo.batch.delete', ['id' => Crypt::encryptString($item->id_batch_produk)]) }}" method="POST" class="delete-form d-inline">
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
                                <div class="modal fade" id="modalUpdateBatch{{ $item->id_batch_produk }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Perbarui Batch Produk <strong>#{{ $item->id_batch_produk }}</strong></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('bo.batch.update', ['id' => Crypt::encryptString($item->id_batch_produk)]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body m-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">NO BATCH PRODUK <span class="text-danger">*</span></label>
                                                        <input type="text" name="no_batch_produk" class="form-control @error('no_batch_produk') is-invalid @enderror" placeholder="NO BATCH PRODUK" value="{{ old('no_batch_produk',$item->no_batch_produk) }}">
                                                        @error('no_batch_produk')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">TANGGAL PRODUKSI <span class="text-danger">*</span></label>
                                                        <input type="date" name="tanggal_produksi" class="form-control @error('tanggal_produksi') is-invalid @enderror" placeholder="TANGGAL PRODUKSI" value="{{ old('tanggal_produksi',$item->tanggal_produksi) }}">
                                                        @error('tanggal_produksi')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">TANGGAL KADALUARSA <span class="text-danger">*</span></label>
                                                        <input type="date" name="tanggal_kadaluarsa" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" placeholder="TANGGAL KADALUARSA" value="{{ old('tanggal_kadaluarsa',$item->tanggal_kadaluarsa) }}">
                                                        @error('tanggal_kadaluarsa')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">TEMPAT PRODUKSI <span class="text-danger">*</span></label>
                                                        <input type="text" name="tempat_produksi" class="form-control @error('tempat_produksi') is-invalid @enderror" placeholder="TEMPAT PRODUKSI" value="{{ old('tempat_produksi',$item->tempat_produksi) }}">
                                                        @error('tempat_produksi')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">QUANTITY <span class="text-danger">*</span></label>
                                                        <input type="number" readonly name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="QUANTITY" value="{{ old('quantity',$item->quantity) }}">
                                                        @error('quantity')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nominal Token</label>
                                                        <input type="number" name="nominal_token" class="form-control @error('nominal_token') is-invalid @enderror" placeholder="Masukkan jumlah produk" value="{{ old('nominal_token',$item->nominal_token) }}">
                                                        @error('nominal_token')
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
            $('div[id^="modalUpdateBatch"]').on('shown.bs.modal', function () {
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