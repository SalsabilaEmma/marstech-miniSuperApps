<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kredit;
use Illuminate\Support\Facades\Session;

class ProdukKreditController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Produk Kredit';
        return view('user.produk-kredit', compact('title'));
    }
    public function produk($id)
    {
        $title = 'Produk Kredit';
        $data_kredit = Kredit::findOrFail($id);
        return view('user.produk-kredit', compact('title','data_kredit'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */

    public function list()
    {
        $title = 'Produk Kredit';
        $data_kredit = Kredit::latest()->get();
        // $data_kredit = Kredit::with('data_kredit')->get();
        return view('admin.produk-kredit.list', compact('data_kredit', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        Kredit::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->route('produk.kredit.list')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $title = 'Produk Kredit';
        $data_kredit = Kredit::find($id);
        return view('admin.produk-kredit.edit', compact('data_kredit','title'));
    }

    public function update(Request $request, Kredit $data_kredit ,$id)
    {
        $data_kredit = Kredit::find($id);
        // dd($data_kredit->id);
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        // $data_kredit->fill($request->post())->save();
        $data_kredit->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('produk.kredit.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_kredit = Kredit::findOrfail($id);
        // Kredit::destroy($id);
        $data_kredit->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
