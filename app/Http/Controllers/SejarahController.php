<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SejarahController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Sejarah';
        $data_sejarah = Sejarah::latest()->get();
        return view('user.sejarah', compact('data_sejarah','title'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Sejarah';
        $data_sejarah = Sejarah::latest()->get();
        return view('admin.sejarah.list', compact('data_sejarah','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data_sejarah = new Sejarah;
        $data_sejarah->id = $request->id;
        $data_sejarah->judul = $request->judul;
        $data_sejarah->isi = $request->isi;
        $data_sejarah->save();
        // dd($data_sejarah);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Sejarah';
        $data_sejarah = Sejarah::find($id);
        // dd($data_sejarah->file);
        return view('admin.sejarah.edit', compact('data_sejarah','title'));
    }

    public function update(Request $request, Sejarah $data_sejarah, $id)
    {
        $data_sejarah = Sejarah::findOrfail($id);
        $request->validate([
            // 'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data_sejarah->update([
            // 'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('sejarah.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_sejarah = Sejarah::findOrfail($id);
        // Deposito::destroy($id);
        $data_sejarah->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // $data_sejarah = Sejarah::findOrfail($id);
        // if(File::exists(public_path('/image/sejarah/'.$data_sejarah->file))){
        //     File::delete(public_path('/image/sejarah/'.$data_sejarah->file));
        //     File::delete(public_path('/image/sejarah-original/'.$data_sejarah->file));
        //     $data_sejarah->delete();
        //     return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        // }else{
        //     return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        // }
    }
}
