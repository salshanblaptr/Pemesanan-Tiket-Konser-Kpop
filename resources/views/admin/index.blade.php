@extends('admin.layout')
@section('content')
<a href="{{ route('pembeli.index') }}" type="button" class="btn btn rounded-3">Data Pembeli</a>
<a href="{{ route('tiket.index') }}" type="button" class="btn btn rounded-3">Data Tiket</a>
<a href="{{ route('admin.index') }}" type="button" class="btn btn rounded-3">Data Admin</a>
<a href="{{ route('pembelian.index') }}" type="button" class="btn btn rounded-3">Data Pembelian</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.index') }}" type="button">Data admin</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('admin.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data admin</h4>
<div class="form-search" style="float:right">
    <form action="{{ route('admin.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Cari Nama admin">
            <button type="submit" class="btn btn-secondary">Search</button>
    </form>
</div>
</div>
<a href="{{ route('admin.create') }}" type="button" class="btn btn-success rounded-3">Tambah admin</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>id admin</th>
            <th>nama admin</th>
            <th>username</th>
            <th>password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_admin }}</td>
            <td>{{ $data->nama_admin }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->password }}</td>
            <td>
                <a href="{{ route('admin.edit', $data->id_admin) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <a href="{{ route('admin.hide', $data->id_admin) }}" type="button"
                    class="btn btn-danger rounded-3">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop