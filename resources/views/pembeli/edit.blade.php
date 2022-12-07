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

        <h5 class="card-title fw-bolder mb-3">Ubah Data pembeli</h5>

		<form method="post" action="{{ route('pembeli.update', $data->id_pembeli) }}">
			@csrf
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">ID pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="{{ $data->id_pembeli }}">
            </div>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama pembeli</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
            </div>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nik pembeli</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}">
            </div>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">No Hp pembeli</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data->no_hp }}">
            </div>
            <div class="mb-3">
                <label for="jadwal" class="form-label">Email pembeli</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
			</div>
		</form>
	</div>
</div>

@stop