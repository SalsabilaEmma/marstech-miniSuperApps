<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class PenghargaanController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.penghargaan');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Penghargaan';
        $data_penghargaan = Penghargaan::latest()->get();
        return view('admin.penghargaan.list', compact('data_penghargaan', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('file');
        $judulfile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/penghargaan/' . $judulfile);
        $image->move('image/penghargaan-original/', $judulfile); // ukuran file asli

        $data_penghargaan = new Penghargaan;
        $data_penghargaan->id = $request->id;
        $data_penghargaan->judul = $request->judul;
        $data_penghargaan->isi = $request->isi;
        $data_penghargaan->file = $judulfile;
        $data_penghargaan->save();
        // dd($data_penghargaan);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Penghargaan';
        $data_penghargaan = Penghargaan::find($id);
        // dd($data_penghargaan->file);
        return view('admin.penghargaan.edit', compact('data_penghargaan', 'title'));
    }

    public function update(Request $request, Penghargaan $data_penghargaan, $id)
    {
        $data_penghargaan = Penghargaan::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'required'
        ]);
        if (File::exists(public_path('/image/penghargaan/' . $data_penghargaan->file))) {  // cek didalem id itu ada file/gambare nggak
            // delete file lama
            File::delete(public_path('/image/penghargaan/' . $data_penghargaan->file));
            File::delete(public_path('/image/penghargaan-original/' . $data_penghargaan->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        $image = $request->file('file');
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/penghargaan/' . $namafile);
        $image->move('image/penghargaan-original/', $namafile); // ukuran file asli
        // perubahan nama & file
        $data_penghargaan->judul = $request->judul;
        $data_penghargaan->isi = $request->isi;
        $data_penghargaan->file = $namafile;
        // dd($data_penghargaan);
        $data_penghargaan->save();
        return redirect()->route('penghargaan.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_penghargaan = Penghargaan::findOrfail($id);
        // Deposito::destroy($id);
        // $data_penghargaan->delete();
        // return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        if (File::exists(public_path('/image/penghargaan/' . $data_penghargaan->file))) {
            File::delete(public_path('/image/penghargaan/' . $data_penghargaan->file));
            File::delete(public_path('/image/penghargaan-original/' . $data_penghargaan->file));
            $data_penghargaan->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
    }
}
