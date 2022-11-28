<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposito;
use Illuminate\Support\Facades\Session;
// use Yajra\Datatables\Datatables;
// use DataTables;

class ProdukDepositoController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Produk Deposito';
        return view('user.produk-deposito', compact('title'));
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }


    /**  Admin Side -------------------------------------------------------------------------------------------------- */

    public function list()
    {
        $title = 'Produk Deposito';
        $data_deposito = Deposito::latest()->get();
        // $data_deposito = Datatables::of(Deposito::query())->make(true);
        // $data_deposito = Deposito::with('data_deposito')->get();
        return view('admin.produk-deposito.list', compact('data_deposito','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        Deposito::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->route('produk.deposito.list')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $title = 'Produk Deposito';
        $data_deposito = Deposito::find($id);
        return view('admin.produk-deposito.edit', compact('data_deposito','title'));
    }

    public function update(Request $request, Deposito $data_deposito, $id)
    {
        $data_deposito = Deposito::find($id);
        // dd($data_deposito->id);
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        // $data_deposito->fill($request->post())->save();
        $data_deposito->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('produk.deposito.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_deposito = Deposito::findOrfail($id);
        // Deposito::destroy($id);
        $data_deposito->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
