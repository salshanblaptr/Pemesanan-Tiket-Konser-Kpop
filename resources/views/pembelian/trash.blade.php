@extends('pembelian.layout')
@section('content')
<a href="{{ route('pembelian.index') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('pembelian.index') }}" type="button">Data pembelian</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('pembelian.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data Trash pembelian</h4>
<div class="form-search" style="float:right">
    <form action="{{ route('pembelian.search_trash') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="text" id="id_pembelian" name="id_pembelian" class="form-control" placeholder="ID Pembelian">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
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
            <th>ID Tiket</th>
            <th>ID Pembelian</th>
            <th>Tanggal Pembelian</th>
            <th>Dihapus Pada</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_pembeli }}</td>
            <td>{{ $data->id_tiket }}</td>
            <td>{{ $data->id_pembelian}}</td>
            <td>{{ $data->tanggal_pembelian}}</td>
            <td>{{ $data->deleted_at }}</td>
            <td>
                <a href="{{ route('pembelian.restore', $data->id_pembelian) }}" type="button"
                    class="btn btn-success rounded-3">Restore</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_pembelian }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_pembelian }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('pembelian.delete', $data->id_pembelian) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop