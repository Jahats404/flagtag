@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Produk <span class="text-uppercase">{{ $brandOwner->nama_perusahaan }}</span>
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.brandowner') }}">Data Brand Owner</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $brandOwner->nama_perusahaan }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">{{$brandOwner->nama_perusahaan }}</h5>
                </div>


                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">NAMA PRODUK</th>
                                <th style="text-align: center;">BRAND OWNER</th>
                                <th style="text-align: center;">KATEGORI PRODUK</th>
                                <th style="text-align: center;">NOMOR SKU</th>
                                <th style="text-align: center;">KOMPOSISI</th>
                                <th style="text-align: center;">DESKRIPSI</th>
                                {{-- <th style="text-align: center;">AKSI</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->nama_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->brandOwner->nama_perusahaan ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->kategori_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->nomor_sku ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->komposisi_produk ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->deskripsi_produk ?? '-' }}</td>
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