@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Unit Produk <span class="text-uppercase text-primary">{{ $batchProduk->produk->nama_produk }}</span> Pada Batch <span class="text-primary">{{ \Carbon\Carbon::parse($batchProduk->tanggal_produksi)->translatedFormat('l, d F Y') }}</span>
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('bo.produk') }}">Data Produk</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('bo.batch', ['id' => encrypt_id($batchProduk->produk->id_produk)]) }}">Batch Produk</a></li>
                <li class="breadcrumb-item active">Detail Batch</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">{{ $batchProduk->produk->nama_produk }}, Batch {{ \Carbon\Carbon::parse($batchProduk->tanggal_produksi)->translatedFormat('l, d F Y') }}</h5>
                </div>


                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">KODE HOLOGRAM</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center;">LOKASI SCAN</th>
                                <th style="text-align: center;">CUSTOMER CLAIMED</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holograms as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->kode_hologram ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 'Active')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Inactive')
                                            <span class="badge bg-info">{{ $item->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{ $item->lokasi_scan ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->customer->nama_lengkap ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="align-middle me-2" data-feather="more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <!-- Tombol Cetak -->
                                                        <a class="dropdown-item" href="{{ route('bo.hologram.print', ['id' => Crypt::encryptString($item->id_hologram)]) }}" target="_blank">
                                                            <i class="align-middle me-2 fas fa-fw fa-qrcode"></i> Cetak
                                                        </a>
                                                    </li>
                                                    {{-- <li>
                                                        <!-- Form Delete -->
                                                        <form action="{{ route('bo.batch.delete', ['id' => Crypt::encryptString($item->id_hologram)]) }}" method="POST" class="delete-form d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger delete-btn">
                                                                <i class="fas fa-trash me-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li> --}}
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