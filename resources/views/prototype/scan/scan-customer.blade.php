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


                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">ID ASET</th>
                                <th style="text-align: center;">BARCODE</th>
                                <th style="text-align: center;">NILAI</th>
                                <th style="text-align: center;">CLAIM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAset as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->id_aset ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->barcode ?? '-' }}</td>
                                    <td style="text-align: center;">{{ 'Rp. ' . number_format($item->nilai, 0, ',', '.') }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->claim == 'Terclaim')
                                            <span class="badge bg-success">{{ $item->claim }}</span>
                                        @else
                                            <span class="badge bg-primary">{{ $item->claim }}</span>
                                            
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
