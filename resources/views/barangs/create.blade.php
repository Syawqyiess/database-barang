@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Tambah Barang</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}">
        @error('kode') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
        @error('nama_barang') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
      </div>

      <div class="mb-3">
        <label for="harga_satuan" class="form-label">Harga Satuan</label>
        <input type="number" step="0.01" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}">
        @error('harga_satuan') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
        @error('jumlah') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
            <label for="foto" class="form-label">Foto (optional)</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
