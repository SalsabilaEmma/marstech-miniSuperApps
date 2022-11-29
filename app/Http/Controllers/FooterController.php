<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Footer';
        return view('user.footer', compact('title'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Footer';
        $data_footer = Footer::latest()->get();
        // $data_footer = Deposito::with('data_footer')->get();
        return view('admin.footer.list', compact('data_footer','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'alamat_lengkap' => 'required',
            'no_telp' => 'required',
            'lokasi' => 'required',
            'email' => 'required',
        ]);
        Footer::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_telp' => $request->no_telp,
            'lokasi' => $request->lokasi,
            'email' => $request->email,
        ]);
        return redirect()->route('footer.list')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $title = 'Footer';
        $data_footer = Footer::find($id);
        return view('admin.footer.edit', compact('data_footer','title'));
    }

    public function update(Request $request, Footer $data_footer, $id)
    {
        $data_footer = Footer::findOrFail($id);
        // dd($request->all());
        $this->validate($request, [
            'isi' => 'required',
            'alamat_lengkap' => 'required',
            'no_telp' => 'required',
            'lokasi' => 'required',
            'email' => 'required',
        ]);
        // $data_footer->fill($request->post())->save();
        $data_footer->update([
            'isi'   => $request->isi,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_telp' => $request->no_telp,
            'lokasi' => $request->lokasi,
            'email' => $request->email,
        ]);
        return redirect()->route('footer.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_footer = Footer::findOrfail($id);
        // Deposito::destroy($id);
        $data_footer->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

}
