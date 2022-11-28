<?php

namespace App\Http\Controllers;

use App\Models\JaringanKantor;
use Illuminate\Http\Request;

class JaringanKantorController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.jaringan-kantor');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Jaringan Kantor';
        $data_jaringan = JaringanKantor::latest()->get();
        return view('admin.jaringan-kantor.list', compact('data_jaringan','title'));
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
        // })->save('image/jaringan/'.$judulfile);
        // $image->move('image/jaringan-original/', $judulfile); // ukuran file asli

        $data_jaringan = new JaringanKantor;
        $data_jaringan->id = $request->id;
        $data_jaringan->judul = $request->judul;
        $data_jaringan->isi = $request->isi;
        // $data_jaringan->file = $judulfile;
        $data_jaringan->save();
        // dd($data_jaringan);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Jaringan Kantor';
        $data_jaringan = JaringanKantor::find($id);
        // dd($data_jaringan->file);
        return view('admin.jaringan-kantor.edit', compact('data_jaringan','title'));
    }

    public function update(Request $request, JaringanKantor $data_jaringan, $id)
    {
        $data_jaringan = JaringanKantor::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data_jaringan->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('jaringan.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_jaringan = JaringanKantor::findOrfail($id);
        // Deposito::destroy($id);
        $data_jaringan->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // $data_jaringan = JaringanKantor::findOrfail($id);
        // if(File::exists(public_path('/image/jaringan/'.$data_jaringan->file))){
        //     File::delete(public_path('/image/jaringan/'.$data_jaringan->file));
        //     File::delete(public_path('/image/jaringan-original/'.$data_jaringan->file));
        //     $data_jaringan->delete();
        //     return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // }else{
        //     return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        // }
    }
}
