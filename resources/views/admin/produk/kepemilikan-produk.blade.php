@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Produk
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Kepemilikan Produk</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Playlist</li> --}}
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Kepemilikan Produk</h5>
                </div>

                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th>Kode</th>
                                <th>Produk</th>
                                <th>Customer</th>
                                <th>Lokasi Scan</th>
                                <th>Waktu Scan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kepemilikanProduk as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->kode_hologram }}</td>
                                    <td>{{ optional($item->batchProduk->produk)->nama_produk ?? '-' }}</td>
                                    <td>{{ $item->customer->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $item->lokasi_scan ?? '-' }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
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