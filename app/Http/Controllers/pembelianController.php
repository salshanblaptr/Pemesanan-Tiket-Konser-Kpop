<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pembelianController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->tanggal_pembelian;
        $datas = DB::table('pembelian')->where('deleted_at', '<>', '' )->where('tanggal_pembelian', 'LIKE', '%'.$get_id.'%')->get();
        return view('pembelian.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE pembelian SET deleted_at=null WHERE id_pembelian = :id_pembelian', ['id_pembelian' => $id]);
        return redirect()->route('pembelian.trash')->with('success', 'Data pembelian berhasil di kembalikan');
    }
    public function trash()
    {
        $datas = DB::select('select * from pembelian where deleted_at is not null');
        return view('pembelian.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE pembelian SET deleted_at=current_timestamp() WHERE id_pembelian = :id_pembelian', ['id_pembelian' => $id]);
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }

    public function index() {
        $datas = DB::select('select * from pembelian where deleted_at is null');

        return view('pembelian.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pembelian.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'id_tiket' => 'required',
            'id_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pembelian(id_pembeli, id_tiket, id_pembelian, tanggal_pembelian) VALUES (:id_pembeli, :id_tiket, :id_pembelian, :tanggal_pembelian)',
        [
            'id_pembeli' => $request->id_pembeli,
            'id_tiket' => $request->id_tiket,
            'id_pembelian' => $request->id_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]
        );

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pembelian')->where('id_pembelian', $id)->first();

        return view('pembelian.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'id_tiket' => 'required',
            'id_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pembelian SET id_pembeli = :id_pembeli, id_tiket = :id_tiket, id_pembelian = :id_pembelian, tanggal_pembelian = :tanggal_pembelian WHERE id_pembelian = :id',
        [
            'id' => $id,
            'id_pembeli' => $request->id_pembeli,
            'id_tiket' => $request->id_tiket,
            'id_pembelian' => $request->id_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,     
        ]
        );
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembelian WHERE id_pembelian = :id_pembelian', ['id_pembelian' => $id]);

        // Menggunakan laravel eloquent
        // pembelian::where('id_pembelian', $id)->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }

    public function search(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('pembelian')->where('tanggal_pembelian', 'LIKE', '%'.$get_nama.'%')->get();
        return view('pembelian.index')->with('datas',$datas);
    }
}