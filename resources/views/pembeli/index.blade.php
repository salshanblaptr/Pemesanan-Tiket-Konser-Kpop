@extends('pembeli.layout')
@section('content')'
<a href="{{ route('pembeli.index') }}" type="button" class="btn btn rounded-3">Data Pembeli</a>
<a href="{{ route('tiket.index') }}" type="button" class="btn btn rounded-3">Data Tiket</a>
<a href="{{ route('admin.index') }}" type="button" class="btn btn rounded-3">Data Admin</a>
<a href="{{ route('pembelian.index') }}" type="button" class="btn btn rounded-3">Data Pembelian</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('pembeli.index') }}" type="button">Data pembeli</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('pembeli.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data pembeli</h4>
<div class="form-search" style="float:right">
    <form action="{{ route('pembeli.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Cari Nama Pembeli">
            <button type="submit" class="btn btn-secondary">Search</button>
    </form>
</div></div>
<a href="{{ route('pembeli.create') }}" type="button" class="btn btn-success rounded-3">Tambah pembeli</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>id pembeli</th>
            <th>Nama pembeli</th>
            <th>Nik</th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_pembeli }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->nik }}</td>
            <td>{{ $data->no_hp }}</td>
            <td>{{ $data->email }}</td>
            <td>
                <a href="{{ route('pembeli.edit', $data->id_pembeli) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <a href="{{ route('pembeli.hide', $data->id_pembeli) }}" type="button"
                    class="btn btn-danger rounded-3">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop