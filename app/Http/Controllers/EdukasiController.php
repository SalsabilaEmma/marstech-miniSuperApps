<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Html\Editor\Editor;

class EdukasiController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.edukasi');
    }

    public function indexEdukasiDetail()
    {
        return view('user.edukasi-detail');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Edukasi';
        $data_edukasi = Edukasi::latest()->get();
        return view('admin.edukasi.list', compact('data_edukasi','title'));
    }

    public function  store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data_edukasi = new Edukasi;
        // $$data_edukasi->id = $request->id;
        $data_edukasi->judul = $request->judul;
        $data_edukasi->isi = $request->isi;
        $data_edukasi->save();
        // dd($data_edukasi);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Edukasi';
        $data_edukasi = Edukasi::find($id);
        // dd($data_edukasi->file);
        return view('admin.edukasi.edit', compact('data_edukasi','title'));
    }

    public function update(Request $request, Edukasi $edukasi, $id)
    {
        $data_edukasi = Edukasi::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // if(File::exists(public_path('/image/edukasi/'.$data_edukasi->file))){
        //     // delete file lama
        //     File::delete(public_path('/image/edukasi/'.$data_edukasi->file));
        //     File::delete(public_path('/image/edukasi-original/'.$data_edukasi->file));
        //     // upload file baru
        //     $image = $request->file('file');
        //     $namafile = time() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
        //         $constraint->aspectRatio();
        //     })->save('image/edukasi/'.$namafile);
        //     $image->move('image/edukasi-original/', $namafile); // ukuran file asli
        //     // perubahan judul & file
        //     $data_edukasi->judul = $request->judul;
        //     $data_edukasi->isi = $request->isi;
        //     $data_edukasi->file = $namafile;
        //     $data_edukasi->save();
        //     return redirect()->route('data_edukasi.list')->with(['success' => 'Data Berhasil Diubah!']);
        // } else {
        //     return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        // }

        $data_edukasi->update([
            'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('edukasi.list')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id)
    {
        $data_edukasi = Edukasi::findOrfail($id);
        $data_edukasi->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
