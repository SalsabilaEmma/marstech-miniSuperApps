<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class PromoController extends Controller
{
    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Promo';
        $data_promo = Promo::latest()->get();
        return view('admin.promo.list', compact('data_promo', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // if (!File::isDirectory('image/promo/' . $request->id)) {
        //     File::makeDirectory('image/promo/' . $request->id);  /** bikin folder baru tiap upload sesuai id parent */
        // }

        $image = $request->file('file');
        $namafile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {
            /** thumbnail */
            $constraint->aspectRatio();
        })->save('image/promo/' . $namafile);
        $image->move('image/promo-original/', $namafile);
        /** ukuran file asli */

        $data_promo = new Promo;
        $data_promo->id = $request->id;
        $data_promo->nama = $request->nama;
        $data_promo->file = $namafile;
        // dd($data_promo);
        $data_promo->save();
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Promo';
        $data_promo = Promo::find($id);
        // dd($data_Promo->file);
        return view('admin.promo.edit', compact('data_promo', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data_promo = Promo::findOrfail($id);
        $request->validate([
            'nama' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (File::exists(public_path('/image/promo/' . $data_promo->file))) {  // cek didalem id itu ada file/gambare nggak
            // delete file lama
            File::delete(public_path('/image/promo/' . $data_promo->file));
            File::delete(public_path('/image/promo-original/' . $data_promo->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        $image = $request->file('file');
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/promo/' . $namafile);
        $image->move('image/promo-original/', $namafile); // ukuran file asli
        // perubahan nama & file
        $data_promo->nama = $request->nama;
        $data_promo->file = $namafile;
        $data_promo->save();
        return redirect()->route('promo.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_promo = Promo::findOrfail($id);
        //  && File::exists(public_path('/image/promo-original/'.$data_promo->file))  |   && File::exists(public_path('/image/promo-original/'.$data_promo->file))
        if (File::exists(public_path('/image/promo/' . $data_promo->file))) {
            File::delete(public_path('/image/promo/' . $data_promo->file));
            File::delete(public_path('/image/promo-original/' . $data_promo->file));
            $data_promo->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }

    }
}
