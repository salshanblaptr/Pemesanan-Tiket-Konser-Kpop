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

        <h5 class="card-title fw-bolder mb-3">Ubah Data pembelian</h5>

		<form method="post" action="{{ route('pembelian.update', $data->id_pembelian) }}">
			@csrf
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">ID pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="{{ $data->id_pembeli }}">
            </div>
            <div class="mb-3">
                <label for="id_tiket" class="form-label">ID tiket</label>
                <input type="text" class="form-control" id="id_tiket" name="id_tiket" value="{{ $data->id_tiket }}">
            </div>
            <div class="mb-3">
                <label for="id_pembelian" class="form-label">ID pembelian</label>
                <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{ $data->id_pembelian }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_pembelian" class="form-label">Tanggal pembelian</label>
                <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ $data->tanggal_pembelian }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
			</div>
		</form>
	</div>
</div>

@stop