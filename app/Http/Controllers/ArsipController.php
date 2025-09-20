<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $surats = Surat::when($search, function($query, $search) {
            return $query->where('judul', 'like', "%$search%");
        })->orderByDesc('created_at')->get();
        return view('arsip.index', compact('surats'));
    }

    public function create()
    {
        $kategoris = \App\Models\KategoriSurat::orderBy('nama')->get();
        return view('arsip.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        $file = $request->file('file')->store('arsip', 'public');
        Surat::create([
            'nomor' => $request->nomor,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file' => $file,
        ]);
        return redirect()->route('arsip.index')->with('success', 'Surat berhasil diarsipkan!');
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('arsip.show', compact('surat'));
    }

    public function download($id)
    {
        $surat = Surat::findOrFail($id);
        return Storage::disk('public')->download($surat->file);
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        Storage::disk('public')->delete($surat->file);
        $surat->delete();
        return redirect()->route('arsip.index')->with('success', 'Surat berhasil dihapus!');
    }

    public function about()
    {
        return view('arsip.about');
    }
}
