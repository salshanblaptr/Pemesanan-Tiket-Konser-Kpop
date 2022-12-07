<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pembeliController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama_pembeli;
        $datas = DB::table('pembeli')->where('deleted_at', '<>', '' )->where('id_pembeli', 'LIKE', '%'.$get_nama.'%')->get();
        return view('pembeli.trash')
        ->with('datas', $datas);
    }

    public function restore($id)
    {
        DB::update('UPDATE pembeli SET deleted_at=null WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);
        return redirect()->route('pembeli.trash')->with('success', 'Data pembeli berhasil di restore');
    }
    public function trash()
    {
        $datas = DB::select('select * from pembeli where deleted_at is not null');
        return view('pembeli.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE pembeli SET deleted_at=current_timestamp() WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);
        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil dihapus');
    }

    public function index() {
        $datas = DB::select('select * from pembeli where deleted_at is null');

        return view('pembeli.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pembeli.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pembeli(id_pembeli, nama, nik, no_hp, email) VALUES (:id_pembeli, :nama, :nik, :no_hp, :email)',
        [
            'id_pembeli' => $request->id_pembeli,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            
            
        ]
        );

        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pembeli')->where('id_pembeli', $id)->first();

        return view('pembeli.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);
            DB::update('UPDATE pembeli SET id_pembeli = :id_pembeli, nama = :nama, nik = :nik, no_hp = :no_hp, email = :email WHERE id_pembeli = :id',
        [
            'id' => $id,
            'id_pembeli' => $request->id_pembeli,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]
        );
        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil diubah');
        }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil dihapus');
    }

    public function search(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('pembeli')->where('id_pembeli', 'LIKE', '%'.$get_nama.'%')->get();
        return view('pembeli.index')->with('datas',$datas);
    }
}