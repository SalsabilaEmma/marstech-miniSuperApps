<?php

namespace App\Http\Controllers;

use App\Models\Vismis;
use Illuminate\Http\Request;

class VismisController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Visi Misi';
        $data_vismis = Vismis::latest()->get();
        return view('user.vismis', compact('data_vismis','title'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Visi Misi';
        $data_vismis = Vismis::latest()->get();
        return view('admin.vismis.list', compact('data_vismis','title'));
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
        // })->save('image/vismis/'.$judulfile);
        // $image->move('image/vismis-original/', $judulfile); // ukuran file asli

        $data_vismis = new Vismis;
        $data_vismis->id = $request->id;
        $data_vismis->judul = $request->judul;
        $data_vismis->isi = $request->isi;
        // $data_vismis->file = $judulfile;
        $data_vismis->save();
        // dd($data_vismis);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Visi Misi';
        $data_vismis = Vismis::find($id);
        // dd($data_vismis->file);
        return view('admin.vismis.edit', compact('data_vismis','title'));
    }

    public function update(Request $request, Vismis $data_vismis, $id)
    {
        $data_vismis = Vismis::findOrfail($id);
        $request->validate([
            // 'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data_vismis->update([
            // 'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('vismis.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_vismis = Vismis::findOrfail($id);
        // Deposito::destroy($id);
        $data_vismis->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // $data_vismis = Vismis::findOrfail($id);
        // if(File::exists(public_path('/image/vismis/'.$data_vismis->file))){
        //     File::delete(public_path('/image/vismis/'.$data_vismis->file));
        //     File::delete(public_path('/image/vismis-original/'.$data_vismis->file));
        //     $data_vismis->delete();
        //     return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // }else{
        //     return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        // }
    }
}
