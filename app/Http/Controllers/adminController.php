<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama_admin;
        $datas = DB::table('admin')->where('deleted_at', '<>', '' )->where('nama_admin', 'LIKE', '%'.$get_nama.'%')->get();
        return view('admin.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE admin SET deleted_at=null WHERE id_admin = :id_admin', ['id_admin' => $id]);
        return redirect()->route('admin.trash')->with('success', 'Data admin berhasil di kembalikan');
    }
    public function trash()
    {
        $datas = DB::select('select * from admin where deleted_at is not null');
        return view('admin.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE admin SET deleted_at=current_timestamp() WHERE id_admin = :id_admin', ['id_admin' => $id]);
        return redirect()->route('admin.index')->with('success', 'Data admin berhasil dihapus');
    }

    public function index() {
        $datas = DB::select('select * from admin where deleted_at is null');

        return view('admin.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('admin.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'password' => 'required',
            'username' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO admin(id_admin, nama_admin, password, username) VALUES (:id_admin, :nama_admin, :password, :username)',
        [
            'id_admin' => $request->id_admin,
            'nama_admin' => $request->nama_admin,
            'password' => $request->password,
            'username' => $request->username,
        ]
        );

        return redirect()->route('admin.index')->with('success', 'Data admin berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('admin')->where('id_admin', $id)->first();

        return view('admin.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'password' => 'required',
            'username' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE admin SET id_admin = :id_admin, nama_admin = :nama_admin, password = :password, username = :username WHERE id_admin = :id',
        [
            'id' => $id,
            'id_admin' => $request->id_admin,
            'nama_admin' => $request->nama_admin,
            'password' => $request->password,
            'username' => $request->username,
            
        ]
        );
        return redirect()->route('admin.index')->with('success', 'Data admin berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM admin WHERE id_admin = :id_admin', ['id_admin' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.index')->with('success', 'Data admin berhasil dihapus');
    }

    public function search(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('admin')->where('nama_admin', 'LIKE', '%'.$get_nama.'%')->get();
        return view('admin.index')->with('datas',$datas);
    }
}