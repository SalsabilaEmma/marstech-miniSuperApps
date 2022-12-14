<?php

namespace App\Http\Controllers;

use App\Models\Direksi;
use Illuminate\Http\Request;

class DireksiController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Direksi';
        $data_direksi = Direksi::latest()->get();
        return view('user.direksi', compact('data_direksi','title'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Direksi';
        $data_direksi = Direksi::latest()->get();
        return view('admin.direksi.list', compact('data_direksi','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // $image = $request->file('file');
        // $judulfile = time() . '.' . $image->getClientOriginalExtension();

        // Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
        //     $constraint->aspectRatio();
        // })->save('image/direksi/'.$judulfile);
        // $image->move('image/direksi-original/', $judulfile); // ukuran file asli

        $data_direksi = new Direksi();
        $data_direksi->id = $request->id;
        $data_direksi->judul = $request->judul;
        $data_direksi->isi = $request->isi;
        // $data_direksi->file = $judulfile;
        $data_direksi->save();
        // dd($data_direksi);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Direksi';
        $data_direksi = Direksi::find($id);
        return view('admin.direksi.edit', compact('data_direksi','title'));
    }

    public function update(Request $request, Direksi $data_direksi, $id)
    {
        $data_direksi = Direksi::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data_direksi->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('direksi.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_direksi = Direksi::findOrfail($id);
        // Deposito::destroy($id);
        $data_direksi->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // $data_direksi = Direksi::findOrfail($id);
        // if(File::exists(public_path('/image/direksi/'.$data_direksi->file))){
        //     File::delete(public_path('/image/direksi/'.$data_direksi->file));
        //     File::delete(public_path('/image/direksi-original/'.$data_direksi->file));
        //     $data_direksi->delete();
        //     return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // }else{
        //     return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        // }
    }
}
