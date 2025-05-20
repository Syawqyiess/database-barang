@extends('layouts.app')

@section('content')
<a href="{{ route('barangs.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
<table class="table table-bordered">
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>deskripsi</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>foto</th>
        <th>Aksi</th>
    </tr>
    @foreach($barangs as $barang)
    <tr>
        <td>{{ $barang->kode }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ $barang->deskripsi }}</td>
        <td>{{ $barang->harga_satuan }}</td>
        <td>{{ $barang->jumlah }}</td>  
        <td>
            @if($barang->foto)
            <img src="{{ asset('images/' . $barang->foto) }}" alt="Foto" width="60" class="rounded shadow-sm">
            @else
                <span class="text-muted fst-italic">Tidak ada</span>
            @endif
        </td>
        <td>
            <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
