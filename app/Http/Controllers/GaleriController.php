<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\GaleriImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class GaleriController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $data_galeri = Galeri::latest()->paginate(9);
        return view('user.galeri', compact('data_galeri'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Galeri';
        $data_galeri = Galeri::latest()->get();
        return view('admin.galeri.list', compact('data_galeri', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            // 'ket' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // if (!File::isDirectory('image/galeri/' . $request->id)) {
        //     File::makeDirectory('image/galeri/' . $request->id);  /** bikin folder baru tiap upload sesuai id parent */
        // }

        $image = $request->file('file');
        $judulfile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {
            /** thumbnail */
            $constraint->aspectRatio();
        })->save('image/galeri/' . $judulfile);
        $image->move('image/galeri-original/', $judulfile);
        /** ukuran file asli */

        $gallery = new Galeri;
        $gallery->id = $request->id;
        $gallery->judul = $request->judul;
        // $gallery->ket = $request->ket;
        $gallery->file = $judulfile;
        $gallery->save();
        // dd($gallery);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    // public function store(Request $request)
    // {
    //     // $request->validate([
    //     //     'kode_aset' => 'required',
    //     //     'judul' => 'required',
    //     // ]);
    //     $images = $request->file('foto');
    //     $data_foto = [];
    //     $data = new Galeri();
    //     $data->id = $request->id;
    //     $data->judul = $request->judul;
    //     $data->foto = json_encode($data_foto);
    //     $data->save();
    //     // foreach ($images as $key => $image) {
    //     //     $namafile = time() . $key + 1 . '.' . $image->getClientOriginalExtension();
    //     //     Image::make($image)->resize(400, 400, function ($constraint) {
    //     //         /** thumbnail */
    //     //         $constraint->aspectRatio();
    //     //     })->save('image/galeri/' . $namafile);
    //     //     $image->move('image/galeri-original/', $namafile);
    //     //     /** ukuran file asli */
    //     //     array_push($data_foto, $namafile);

    //     //     $data->gambar()->create([
    //     //         "gambar" => $namafile
    //     //     ]);
    //     // }
    //     return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    // }

    // public function update(Request $request, $id)
    // {
    //     $data_galeri = Galeri::findOrfail($id);
    //     // dd($data_galeri);
    //     // $request->validate([
    //     //     'judul' => 'required',
    //     //     'kode_aset' => 'required',
    //     //     'detail' => 'required',
    //     //     'harga' => 'required',
    //     //     'lokasi' => 'required',
    //     //     'tanggal' => 'required',
    //     //     'no_telp' => 'required',
    //     //     'foto[]' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     // ]);
    //     // $data = json_decode($data_galeri->foto);
    //     //     if (File::exists(public_path('/image/galeri/' . $foto))) {
    //     //         // delete file lama
    //     //         File::delete(public_path('/image/galeri/' . $foto));
    //     //         File::delete(public_path('/image/galeri-original/' . $foto));
    //     //     }
    //     // }
    //     // upload file baru
    //     $images = $request->file('foto');
    //     $data_foto = [];

    //     $data_galeri->judul = $request->judul;
    //     // $data_galeri->foto = json_encode($data_foto);
    //     $data_galeri->foto = " ";
    //     $data_galeri->save();
    //     if ($images != NULL) {
    //         foreach ($images as $key => $image) {
    //             $judulfile = time() . $key + 1 . '.' . $image->getClientOriginalExtension();
    //             Image::make($image)->resize(400, 400, function ($constraint) {
    //                 /** thumbnail */
    //                 $constraint->aspectRatio();
    //             })->save('image/galeri/' . $judulfile);
    //             $image->move('image/galeri-original/', $judulfile);
    //             /** ukuran file asli */
    //             array_push($data_foto, $judulfile);
    //             /** create file sesuai id */
    //             $data_galeri->gambar()->create([
    //                 "gambar" => $judulfile
    //             ]);
    //         }
    //     }
    //     return redirect()->route('galeri.list')->with(['success' => 'Data Berhasil Diubah!']);
    // }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = 'Galeri';
        $data_galeri = Galeri::find($id);
        return view('admin.galeri.edit', compact('data_galeri', 'title'));
    }


    public function update(Request $request, $id)
    {
        $data_galeri = Galeri::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            // 'ket' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (File::exists(public_path('/image/galeri/' . $data_galeri->file))) {  // cek didalem id itu ada file/gambare nggak
            // delete file lama
            File::delete(public_path('/image/galeri/' . $data_galeri->file));
            File::delete(public_path('/image/galeri-original/' . $data_galeri->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        $image = $request->file('file');
        $judulfile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/galeri/' . $judulfile);
        $image->move('image/galeri-original/', $judulfile); // ukuran file asli
        // perubahan judul & file
        $data_galeri->judul = $request->judul;
        // $data_galeri->ket = $request->ket;
        $data_galeri->file = $judulfile;
        $data_galeri->save();
        return redirect()->route('galeri.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_galeri = Galeri::findOrfail($id);
        $data_galeri->delete();
        // $data_galeri->gambar()->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

    public function delete($id)
    {
        /** Hapus file di direktori */
        $data_galeri = GaleriImage::findOrfail($id);
        $foto = $data_galeri->gambar;
        File::delete(public_path('/image/galeri/' . $foto));
        File::delete(public_path('/image/galeri-original/' . $foto));
        /** Hapus data file dengan id galeri terkait */
        GaleriImage::destroy($id);
        return [
            "status" => true,
            "id" => $id,
        ];
    }
}
