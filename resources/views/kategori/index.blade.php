@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-light sidebar py-4">
            <h5>Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('arsip.index') }}">&#9733; Arsip</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('kategori.index') }}">&#128193; Kategori Surat</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">&#8505; About</a></li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="col-md-10 py-4">
            <h2>Kategori Surat</h2>
            <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br> Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
            <form class="form-inline mb-3" method="GET" action="{{ route('kategori.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Cari!</button>
                    </div>
                </div>
            </form>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->keterangan }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteModal(this)">Hapus</button>
                            </form>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center">Tidak ada kategori ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('kategori.create') }}" class="btn btn-success">[ + ] Tambah Kategori Baru...</a>
        </div>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->
<div class="modal" tabindex="-1" role="dialog" id="deleteModal" style="display:none; background:rgba(0,0,0,0.3); position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:9999;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background:#fff; border-radius:8px;">
      <div class="modal-body text-center p-4">
        <h5 class="mb-3">Alert</h5>
        <p>Apakah Anda yakin ingin menghapus kategori ini?</p>
        <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-secondary mr-2" onclick="closeDeleteModal()">Batal</button>
          <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Ya!</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
let formToDelete = null;
function showDeleteModal(btn) {
    formToDelete = btn.closest('form');
    document.getElementById('deleteModal').style.display = 'block';
}
function closeDeleteModal() {
    formToDelete = null;
    document.getElementById('deleteModal').style.display = 'none';
}
// Modal konfirmasi hapus
 document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('deleteConfirmBtn').onclick = function() {
        if (formToDelete) {
            formToDelete.submit();
        }
        closeDeleteModal();
    };
});
</script>
@endsection
