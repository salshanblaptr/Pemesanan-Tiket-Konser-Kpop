@extends('tiket.layout')
@section('content')
<a href="{{ route('pembeli.index') }}" type="button" class="btn btn rounded-3">Data Pembeli</a>
<a href="{{ route('tiket.index') }}" type="button" class="btn btn rounded-3">Data Tiket</a>
<a href="{{ route('admin.index') }}" type="button" class="btn btn rounded-3">Data Admin</a>
<a href="{{ route('pembelian.index') }}" type="button" class="btn btn rounded-3">Data Pembelian</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('tiket.index') }}" type="button">Data tiket</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('tiket.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data tiket</h4>
<a href="{{ route('tiket.create') }}" type="button" class="btn btn-success rounded-3">Tambah tiket</a>
<div class="form-search" style="float:right">
    <form action="{{ route('tiket.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Cari ID tiket">
            <button type="submit" class="btn btn-secondary">Search</button>
    </form>
</div>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Pembeli</th>
            <th>Harga Tiket</th>
            <th>Tanggal</th>
            <th>ID Tiket</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_pembeli }}</td>
            <td>{{ $data->harga_tiket }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->id_tiket }}</td>
            <td>
            <td>
                <a href="{{ route('tiket.edit', $data->id_tiket) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <a href="{{ route('tiket.hide', $data->id_tiket) }}" type="button"
                    class="btn btn-danger rounded-3">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop