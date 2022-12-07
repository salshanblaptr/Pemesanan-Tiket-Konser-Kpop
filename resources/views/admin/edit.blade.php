@extends('admin.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data admin</h5>

		<form method="post" action="{{ route('admin.update', $data->id_admin) }}">
			@csrf
            <div class="mb-3">
                <label for="id_admin" class="form-label">ID admin</label>
                <input type="text" class="form-control" id="id_admin" name="id_admin" value="{{ $data->id_admin }}">
            </div>
            <div class="mb-3">
                <label for="nama_admin" class="form-label">Nama admin</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="{{ $data->nama_admin }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="text" class="form-control" id="pass" name="password" value="{{ $data->password }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
			</div>
		</form>
	</div>
</div>

@stop