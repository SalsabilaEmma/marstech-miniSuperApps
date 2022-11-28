<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class KarirController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.karir');
    }

    public function indexKarirDetail()
    {
        return view('user.karir-detail');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Karir';
        $data_karir = Karir::latest()->get();
        return view('admin.karir.list', compact('data_karir', 'title'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // if (!File::isDirectory('image/karir/' . $request->id)) {
        //     File::makeDirectory('image/karir/' . $request->id);  /** bikin folder baru tiap upload sesuai id parent */
        // }

        $image = $request->file('file');
        $judulfile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {
            /** thumbnail */
            $constraint->aspectRatio();
        })->save('image/pengumuman-karir/' . $judulfile);
        $image->move('image/pengumuman-karir-original/', $judulfile);
        /** ukuran file asli */

        $data_karir = new Karir;
        $data_karir->id = $request->id;
        $data_karir->judul = $request->judul;
        $data_karir->isi = $request->isi;
        $data_karir->file = $judulfile;
        // dd($data_karir);
        $data_karir->save();
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Karir';
        $data_karir = Karir::find($id);
        // dd($data_karir->file);
        return view('admin.karir.edit', compact('data_karir', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data_karir = Karir::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (File::exists(public_path('/image/pengumuman-karir/' . $data_karir->file))) {  // cek didalem id itu ada file/gambare nggak
            // delete file lama
            File::delete(public_path('/image/pengumuman-karir/' . $data_karir->file));
            File::delete(public_path('/image/pengumuman-karir-original/' . $data_karir->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        $image = $request->file('file');
        $judulfile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/pengumuman-karir/' . $judulfile);
        $image->move('image/pengumuman-karir-original/', $judulfile); // ukuran file asli
        // perubahan judul & file
        $data_karir->judul = $request->judul;
        $data_karir->isi = $request->isi;
        $data_karir->file = $judulfile;
        // dd($data_karir);
        $data_karir->save();
        return redirect()->route('karir.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_karir = Karir::findOrfail($id);
        //  && File::exists(public_path('/image/karir-original/'.$data_karir->file))  |   && File::exists(public_path('/image/karir-original/'.$data_karir->file))
        if (File::exists(public_path('/image/pengumuman-karir/' . $data_karir->file))) {
            File::delete(public_path('/image/pengumuman-karir/' . $data_karir->file));
            File::delete(public_path('/image/pengumuman-karir-original/' . $data_karir->file));
            $data_karir->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
    }
}
