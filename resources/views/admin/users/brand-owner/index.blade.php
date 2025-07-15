@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            BRAND OWNER
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Data Brand Owner</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Playlist</li> --}}
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Data Brand Owner</h5>
                    {{-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
                        Tambah Brand Owner <i class="align-middle" data-feather="plus-circle"></i>
                    </button> --}}
                </div>

                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                {{-- <th style="text-align: center;">ID_perusahaan PRODUK</th> --}}
                                <th style="text-align: center;">NAMA PERUSAHAAN</th>
                                <th style="text-align: center;">ALAMAT PERUSAHAAN</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brandOwners as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->nama_perusahaan }}</td>
                                    <td style="text-align: center;">{{ $item->alamat_perusahaan ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->status ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="align-middle me-2" data-feather="more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <!-- Tombol Produk -->
                                                        <a class="dropdown-item" href="{{ route('admin.brandowner.produk', ['id' => encrypt_id($item->id_perusahaan)]) }}">
                                                            <i class="align-middle me-2" data-feather="box"></i> Produk
                                                        </a>
                                                        <!-- Tombol Edit -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUpdateBrandOwner{{ $item->id_perusahaan }}">
                                                            <i class="fas fa-pen me-2"></i> Update
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- MODAL UPDATE PRODUK --}}
                                <div class="modal fade" id="modalUpdateBrandOwner{{ $item->id_perusahaan }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Perbarui Data <strong>#{{ $item->id_perusahaan }}</strong></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.brandowner.update', ['id' => Crypt::encryptString($item->id_perusahaan)]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body m-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" placeholder="Nama Perusahaan" 
                                                            value="{{ old('nama_perusahaan',$item->nama_perusahaan) }}">
                                                        @error('nama_perusahaan')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat Perusahaan <span class="text-danger">*</span></label>
                                                        <input type="text" name="alamat_perusahaan" class="form-control @error('alamat_perusahaan') is-invalid @enderror" placeholder="Alamat Perusahaan" 
                                                            value="{{ old('alamat_perusahaan',$item->alamat_perusahaan) }}">
                                                        @error('alamat_perusahaan')
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


    {{-- SCRIPT SELECT 2 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Select2
            $(".select2Role").each(function() {
                $(this)
                    .wrap("<div class=\"position-relative\"></div>")
                    .select2({
                        placeholder: "-- Pilih Role --",
                        dropdownParent: $(this).parent()
                    });
            });

            // Jika ada error Laravel, tambahkan class is-invalid ke Select2
            if ($(".select2Role").hasClass("is-invalid")) {
                $(".select2Role").next('.select2-container').addClass("is-invalid");
            }
        });
    </script>

    {{-- SCRIPT SELECT 2 UPDATE --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Select2 setiap kali modal dibuka
            $('div[id^="modalUpdateBrandOwner"]').on('shown.bs.modal', function () {
                $(this).find('.select2RoleUpdate').each(function () {
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
            $(".select2RoleUpdate").on("change", function() {
                let hiddenField = $(this).data("hidden-id");
                $("#" + hiddenField).val($(this).val());
            });
        });
    </script>


    @include('validation.notifications')
@endsection