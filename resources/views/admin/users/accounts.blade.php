@extends('master')
@section('content')
    <div class="header">
        <h1 class="header-title">
            
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Data Akun</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Playlist</li> --}}
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Data Akun</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahAkun">
                        Tambah Akun <i class="align-middle" data-feather="plus-circle"></i>
                    </button>
                </div>

                {{-- MODAL TAMBAH AKUN --}}
                <div class="modal fade" id="modalTambahAkun" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Akun</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body m-3">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Perusahaan/Customer <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Perusahaan/Customer" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Masukkan email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Konfirmasi Password --}}
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Ulangi password" required>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                        <select class="form-control select2Role @error('role_id') is-invalid @enderror" 
                                            name="role_id">
                                            <option value="">-- Pilih Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id_role }}" 
                                                    {{ old('role_id') == $role->id_role ? 'selected' : '' }}>
                                                    {{ $role->level }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
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
                                <th style="text-align: center;">NAMA</th>
                                <th style="text-align: center;">EMAIL</th>
                                <th style="text-align: center;">ROLE</th>
                                <th style="text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $item->brandOwner ? $item->brandOwner->nama_perusahaan : $item->customer->nama_lengkap ?? '-' }}</td>
                                    <td style="text-align: center;">{{ $item->email ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->role->level == 'Admin')
                                            <span class="badge bg-primary">{{ $item->role->level}}</span>
                                        @elseif ($item->role->level == 'Brand Owner')
                                            <span class="badge" style="background-color: #22cb1d;">{{ $item->role->level}}</span>
                                        @elseif ($item->role->level == 'Customer')
                                            <span class="badge bg-info">{{ $item->role->level}}</span>
                                        @else
                                            -
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
                                                        <!-- Tombol Edit -->
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUpdateUsers{{ $item->id }}">
                                                            <i class="fas fa-pen me-2"></i> Update
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <!-- Form Delete -->
                                                        <form action="{{ route('admin.users.delete', ['id' => Crypt::encryptString($item->id)]) }}" method="POST" class="delete-form d-inline">
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
                                <div class="modal fade" id="modalUpdateUsers{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Perbarui Akun</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.users.update', ['id' => Crypt::encryptString($item->id)]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body m-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Perusahaan/Customer <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Perusahaan/Customer" 
                                                            value="{{ old('nama',optional($item->brandOwner)->nama_perusahaan ?? optional($item->customer)->nama_lengkap ?? '') }}">
                                                        @error('nama')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    {{-- Email --}}
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email',$item->email) }}" placeholder="Masukkan email" required>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    {{-- Password --}}
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Masukkan password">
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    {{-- Konfirmasi Password --}}
                                                    <div class="mb-3">
                                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            placeholder="Ulangi password">
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                                        <select class="form-control select2RoleUpdate @error('role_id') is-invalid @enderror" 
                                                            name="role_id">
                                                            <option value="">-- Pilih Role --</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id_role }}" 
                                                                    {{ old('role_id',$item->role_id) == $role->id_role ? 'selected' : '' }}>
                                                                    {{ $role->level }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('role_id')
                                                            <span class="invalid-feedback d-block">{{ $message }}</span>
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
            $('div[id^="modalUpdateUsers"]').on('shown.bs.modal', function () {
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