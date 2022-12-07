<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class tiketController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama_tiket;
        $datas = DB::table('tiket')->where('deleted_at', '<>', '' )->where('id_tiket', 'LIKE', '%'.$get_nama.'%')->get();
        return view('tiket.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE tiket SET deleted_at=null WHERE id_tiket = :id_tiket', ['id_tiket' => $id]);
        return redirect()->route('tiket.trash')->with('success', 'Data tiket berhasil di restore');
    }
    public function trash()
    {
        $datas = DB::select('select * from tiket where deleted_at is not null');
        return view('tiket.trash')
            ->with('datas', $datas);
    }
    public function hide($id) //soft deleted
    {
        DB::update('UPDATE tiket SET deleted_at=current_timestamp() WHERE id_tiket = :id_tiket', ['id_tiket' => $id]);
        return redirect()->route('tiket.index')->with('success', 'Data tiket berhasil dihapus');
    }

    public function index() {
        $datas = DB::select('select * from tiket where deleted_at is null');

        return view('tiket.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('tiket.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'harga_tiket' => 'required',
            'tanggal' => 'required',
            'id_tiket' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO tiket(id_pembeli, harga_tiket, tanggal, id_tiket) VALUES (:id_pembeli, :harga_tiket, :tanggal, :id_tiket)',
        [
            'id_pembeli' => $request->id_pembeli,
            'harga_tiket' => $request->harga_tiket,
            'tanggal' => $request->tanggal,
            'id_tiket' => $request->id_tiket,
            
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_tiket_admin' => $request->nama_tiket_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('tiket.index')->with('success', 'Data tiket berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('tiket')->where('id_tiket', $id)->first();

        return view('tiket.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'harga_tiket' => 'required',
            'tanggal' => 'required',
            'id_tiket' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE tiket SET id_pembeli = :id_pembeli, harga_tiket = :harga_tiket, tanggal = :tanggal, id_tiket= :id_tiket WHERE id_tiket = :id',
        [
            'id' => $id,
            'id_pembeli' => $request->id_pembeli,
            'harga_tiket' => $request->harga_tiket,
            'tanggal' => $request->tanggal,
            'id_tiket' => $request->id_tiket,
            
        ]
        );
        return redirect()->route('tiket.index')->with('success', 'Data tiket berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM tiket WHERE id_tiket = :id_tiket', ['id_tiket' => $id]); //delated beneran

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('tiket.index')->with('success', 'Data tiket berhasil dihapus');
    }


    public function search(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('tiket')->where('id_tiket', 'LIKE', '%'.$get_nama.'%')->get();
        return view('tiket.index')->with('datas',$datas);
    }
}