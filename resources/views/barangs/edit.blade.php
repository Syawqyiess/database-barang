@extends('layouts.app')

@section('content')
    <h1>Edit Barang</h1>

    <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $barang->kode }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $barang->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" value="{{ $barang->harga_satuan }}" required>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $barang->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            @if($barang->foto)
                <img src="{{ asset('images/' . $barang->foto) }}" width="150" class="mb-2">
            @else
                <p><i>Tidak ada foto</i></p>
            @endif
        </div>

        <div class="mb-3">
            <label>Ganti Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Barang</button>
        <a href="{{ route('
