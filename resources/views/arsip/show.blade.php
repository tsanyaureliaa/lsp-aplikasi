@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Arsip Surat &gt;&gt; Lihat</h3>
    <div class="mb-2">
        <div>Nomor: <b>{{ $surat->nomor }}</b></div>
        <div>Kategori: <b>{{ $surat->kategori }}</b></div>
        <div>Judul: <b>{{ $surat->judul }}</b></div>
        <div>Waktu Unggah: <b>{{ $surat->created_at->format('Y-m-d H:i') }}</b></div>
    </div>
    <div class="border mb-3" style="background:#fff; min-height:350px; display:flex; align-items:center; justify-content:center;">
        <iframe src="{{ asset('storage/' . $surat->file) }}" width="90%" height="350px" style="border:none;"></iframe>
    </div>
    <div class="d-flex">
        <a href="{{ route('arsip.index') }}" class="btn btn-secondary mr-2">&lt;&lt; Kembali</a>
        <a href="{{ route('arsip.download', $surat->id) }}" class="btn btn-warning mr-2">Unduh</a>
        <!-- <a href="#" class="btn btn-dark">Edit/Ganti File</a> -->
    </div>
</div>
@endsection
