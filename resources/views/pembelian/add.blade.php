@extends('pembelian.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Data pembelian</h5>
        <form method="post" action="{{ route('pembelian.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">ID</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli">
            </div>
            <div class="mb-3">
                <label for="id_tiket" class="form-label">ID tiket</label>
                <input type="text" class="form-control" id="id_tiket" name="id_tiket">
            </div>
            <div class="mb-3">
                <label for="id_pembelian" class="form-label">ID pembelian</label>
                <input type="text" class="form-control" id="id_pembelian" name="id_pembelian">
            </div>
            <div class="mb-3">
                <label for="tanggal_pembelian" class="form-label">Tanggal pembelian</label>
                <input type="text" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Email pembelian</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop