<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;

class ProdukTabunganController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Produk Tabungan';
        return view('user.produk-tabungan', compact('title'));
    }

    public function produk($id)
    {
        $title = 'Produk Tabungan';
        $data_tabungan = Tabungan::findOrFail($id);
        return view('user.produk-tabungan', compact('title','data_tabungan'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Produk Tabungan';
        $data_tabungan = Tabungan::latest()->get();
        // $data_tabungan = Deposito::with('data_tabungan')->get();
        return view('admin.produk-tabungan.list', compact('data_tabungan','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        Tabungan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->route('produk.tabungan.list')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $title = 'Produk Tabungan';
        $data_tabungan = Tabungan::find($id);
        return view('admin.produk-tabungan.edit', compact('data_tabungan','title'));
    }

    public function update(Request $request, Tabungan $data_tabungan, $id)
    {
        $data_tabungan = Tabungan::find($id);
        // dd($deposito->id);
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        // $data_tabungan->fill($request->post())->save();
        $data_tabungan->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('produk.tabungan.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_tabungan = Tabungan::findOrfail($id);
        // Deposito::destroy($id);
        $data_tabungan->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }


}
