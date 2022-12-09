<?php

namespace App\Http\Controllers;

use Clockwork\Storage\Storage;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class BannerController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        // index user
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Banner';
        $data_banner = Banner::latest()->get();
        return view('admin.banner.list', compact('data_banner', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'ket' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // if (!File::isDirectory('image/banner/' . $request->id)) {
        //     File::makeDirectory('image/banner/' . $request->id);  /** bikin folder baru tiap upload sesuai id parent */
        // }

        $image = $request->file('file');
        $namafile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {
            /** thumbnail */
            $constraint->aspectRatio();
        })->save('image/banner/' . $namafile);
        $image->move('image/banner-original/', $namafile);
        /** ukuran file asli */

        $gallery = new Banner;
        $gallery->id = $request->id;
        $gallery->nama = $request->nama;
        $gallery->ket = $request->ket;
        $gallery->file = $namafile;
        $gallery->save();
        // dd($gallery);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Banner';
        $data_banner = Banner::find($id);
        // dd($data_banner->file);
        return view('admin.banner.edit', compact('data_banner', 'title'));
    }

    public function update(Request $request, Banner $data_banner, $id)
    {
        $data_banner = Banner::findOrfail($id);
        $request->validate([
            'nama' => 'required',
            'ket' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (File::exists(public_path('/image/banner/' . $data_banner->file))) {  // cek didalem id itu ada file/gambare nggak
            // delete file lama
            File::delete(public_path('/image/banner/' . $data_banner->file));
            File::delete(public_path('/image/banner-original/' . $data_banner->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        $image = $request->file('file');
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/banner/' . $namafile);
        $image->move('image/banner-original/', $namafile); // ukuran file asli
        // perubahan nama & file
        $data_banner->nama = $request->nama;
        $data_banner->ket = $request->ket;
        $data_banner->file = $namafile;
        $data_banner->save();
        return redirect()->route('banner.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_banner = Banner::findOrfail($id);
        //  && File::exists(public_path('/image/banner-original/'.$data_banner->file))  |   && File::exists(public_path('/image/banner-original/'.$data_banner->file))
        if (File::exists(public_path('/image/banner/' . $data_banner->file))) {
            File::delete(public_path('/image/banner/' . $data_banner->file));
            File::delete(public_path('/image/banner-original/' . $data_banner->file));
            $data_banner->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }

    }
}
