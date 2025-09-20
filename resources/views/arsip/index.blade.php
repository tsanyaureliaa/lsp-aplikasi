@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Arsip Surat</h2>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br> Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
    <form class="form-inline mb-3" method="GET" action="{{ route('arsip.index') }}">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit">Cari!</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($surats as $surat)
            <tr>
                <td>{{ $surat->nomor }}</td>
                <td>{{ $surat->kategori }}</td>
                <td>{{ $surat->judul }}</td>
                <td>{{ $surat->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <form action="{{ route('arsip.destroy', $surat->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteModal(this)">Hapus</button>
                    </form>
                    <a href="{{ route('arsip.download', $surat->id) }}" class="btn btn-warning btn-sm">Unduh</a>
                    <a href="{{ route('arsip.show', $surat->id) }}" class="btn btn-primary btn-sm">Lihat &gt;&gt;</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">Tidak ada surat ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('arsip.create') }}" class="btn btn-dark">Arsipkan Surat..</a>

    <!-- Modal Konfirmasi Hapus -->
            <div class="modal" tabindex="-1" role="dialog" id="deleteModal" style="display:none; background:rgba(0,0,0,0.3); position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:9999;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background:#fff; border-radius:8px;">
                        <div class="modal-body text-center p-4">
                            <h5 class="mb-3">Alert</h5>
                            <p>Apakah Anda yakin ingin menghapus arsip surat ini?</p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary mr-2" onclick="closeDeleteModal()">Batal</button>
                                <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Ya!</button>
                            </div>
                        </div>
                    </div>
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
