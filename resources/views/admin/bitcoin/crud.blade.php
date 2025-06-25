@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Bitcoin Treasuries
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Bitcoin Treasuries</a></li>
                <li class="breadcrumb-item active" aria-current="page">Playlist</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Bitcoin Treasuries</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahModul">Add Playlist</button>
                </div>

                {{-- MODAL TAMBAH LOKASI --}}
                <div class="modal fade" id="modalTambahModul" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Modul</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('bitcoin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body m-3">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Modul <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Nama Modul" value="{{ old('nama_modul') }}">
                                        @error('nama_modul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                
                                    <div class="mb-3">
                                        <label class="form-label">Upload Video <span class="text-danger">*</span></label>
                                        <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
                                        @error('video')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                
                                    <div class="mb-3">
                                        <label class="form-label">Harga Modul (Rp) <span class="text-danger">*</span></label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Contoh: 50000" value="{{ old('price') }}">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                
                                    <div class="mb-3">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                                            <option value="Locked" {{ old('status') == 'Locked' ? 'selected' : '' }}>Locked</option>
                                        </select>
                                        @error('status')
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
                                <th style="text-align: center;">NAMA MODUL</th>
                                <th style="text-align: center;">HARGA</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_modul }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdateModul{{ $item->id_modul }}">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                    
                                            <!-- Form Delete -->
                                            <form action="{{ route('bitcoin.delete', ['id' => $item->id_modul]) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm delete-btn" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

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

                                {{-- MODAL UPDATE MODUL --}}
                                <div class="modal fade" id="modalUpdateModul{{ $item->id_modul }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Perbarui Modul</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('bitcoin.update', ['id' => $item->id_modul]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body m-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Modul <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_modul" class="form-control @error('nama_modul') is-invalid @enderror" placeholder="Nama Modul" value="{{ old('nama_modul',$item->nama_modul) }}">
                                                        @error('nama_modul')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Video <span class="text-danger">*</span></label>
                                                        <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
                                                        @error('video')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga Modul (Rp) <span class="text-danger">*</span></label>
                                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Contoh: 50000" value="{{ old('price',$item->price) }}">
                                                        @error('price')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                
                                                    <div class="mb-3">
                                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                                                            <option value="">-- Pilih Status --</option>
                                                            <option value="Available" {{ old('status',$item->status) == 'Available' ? 'selected' : '' }}>Available</option>
                                                            <option value="Locked" {{ old('status',$item->status) == 'Locked' ? 'selected' : '' }}>Locked</option>
                                                        </select>
                                                        @error('status')
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
