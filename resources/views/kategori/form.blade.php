@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width:600px;">
    <h3>Kategori Surat &gt;&gt; {{ $kategori->id ? 'Edit' : 'Tambah' }}</h3>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>
    <form action="{{ $kategori->id ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
        @csrf
        @if($kategori->id)
            @method('PUT')
        @endif
        <div class="form-group">
            <label>ID (Auto Increment)</label>
            <input type="text" class="form-control" value="{{ $kategori->id ?? 'Auto' }}" readonly>
        </div>
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}" required>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <textarea name="keterangan" class="form-control" rows="2" required>{{ old('keterangan', $kategori->keterangan) }}</textarea>
        </div>
        <div class="mt-3">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary mr-2">&lt;&lt; Kembali</a>
            <button type="submit" class="btn btn-dark">Simpan</button>
        </div>
    </form>
</div>
@endsection
