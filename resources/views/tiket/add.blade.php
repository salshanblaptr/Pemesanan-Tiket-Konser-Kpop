@extends('tiket.layout')
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
        <h5 class="card-title fw-bolder mb-3">Tambah Data tiket</h5>
        <form method="post" action="{{ route('tiket.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">ID Pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli">
            </div>
            <div class="mb-3">
                <label for="harga_tiket" class="form-label">Harga tiket</label>
                <input type="text" class="form-control" id="harga_tiket" name="harga_tiket">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="id_tiket" class="form-label">ID Tiket</label>
                <input type="text" class="form-control" id="id_tiket" name="id_tiket">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop