@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Arsip Surat &gt;&gt; Unggah</h3>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
    <b>Catatan:</b><br>
    &bull; Gunakan file berformat PDF</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nomor Surat</label>
            <input type="text" name="nomor" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->nama }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group d-flex align-items-center">
            <label class="mr-2 mb-0">File Surat (PDF)</label>
            <input type="file" name="file" class="form-control-file" accept="application/pdf" required>
        </div>
        <div class="mt-3">
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary mr-2">&lt;&lt; Kembali</a>
            <button type="submit" class="btn btn-dark">Simpan</button>
        </div>
    </form>
</div>
@endsection
