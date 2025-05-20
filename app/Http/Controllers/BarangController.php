<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    // Menampilkan semua data barang
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        return view('barangs.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:barangs,kode',
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image|max:2048' // maksimal 2MB
        ]);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('images', 'public');
        }

        Barang::create($validated);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan detail barang
    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    // Menampilkan form edit barang
    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    // Menyimpan perubahan data barang
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:barangs,kode,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
                Storage::disk('public')->delete($barang->foto);
            }
            // Simpan foto baru
            $validated['foto'] = $request->file('foto')->store('images', 'public');
        }

        $barang->update($validated);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus data barang beserta foto (jika ada)
    public function destroy(Barang $barang)
    {
        if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }
}
