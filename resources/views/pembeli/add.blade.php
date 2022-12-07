@extends('pembeli.layout')
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
        <h5 class="card-title fw-bolder mb-3">Tambah Data pembeli</h5>
        <form method="post" action="{{ route('pembeli.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">ID</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli">
            </div>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama pembeli</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="NIK" class="form-label">Nik pembeli</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp pembeli</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Email pembeli</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop