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
        return view('user.galeri');
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
        // $request->validate([
        //     'kode_aset' => 'required',
        //     'judul' => 'required',
        // ]);
        $images = $request->file('foto');
        $data_foto = [];

        // dd($namafile);
        $data = new Galeri();
        $data->id = $request->id;
        $data->judul = $request->judul;
        $data->foto = json_encode($data_foto);
        $data->save();
        foreach ($images as $key => $image) {
            $namafile = time() . $key + 1 . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400, function ($constraint) {
                /** thumbnail */
                $constraint->aspectRatio();
            })->save('image/galeri/' . $namafile);
            $image->move('image/galeri-original/', $namafile);
            /** ukuran file asli */
            array_push($data_foto, $namafile);

            $data->gambar()->create([
                "gambar" => $namafile
            ]);
        }
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

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
        // dd($data_galeri);
        // $request->validate([
        //     'judul' => 'required',
        //     'kode_aset' => 'required',
        //     'detail' => 'required',
        //     'harga' => 'required',
        //     'lokasi' => 'required',
        //     'tanggal' => 'required',
        //     'no_telp' => 'required',
        //     'foto[]' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);
        // $data = json_decode($data_galeri->foto);
        //     if (File::exists(public_path('/image/galeri/' . $foto))) {
        //         // delete file lama
        //         File::delete(public_path('/image/galeri/' . $foto));
        //         File::delete(public_path('/image/galeri-original/' . $foto));
        //     }
        // }
        // upload file baru
        $images = $request->file('foto');
        $data_foto = [];

        $data_galeri->judul = $request->judul;
        // $data_galeri->foto = json_encode($data_foto);
        $data_galeri->foto = " ";
        $data_galeri->save();
        if ( $images != NULL ) {
            foreach ($images as $key => $image) {
                $namafile = time() . $key + 1 . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(400, 400, function ($constraint) {
                    /** thumbnail */
                    $constraint->aspectRatio();
                })->save('image/galeri/' . $namafile);
                $image->move('image/galeri-original/', $namafile);
                /** ukuran file asli */
                array_push($data_foto, $namafile);
                /** create file sesuai id */
                $data_galeri->gambar()->create([
                    "gambar" => $namafile
                ]);
            }
        }
        return redirect()->route('galeri.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_galeri = Galeri::findOrfail($id);
        $data_galeri->delete();
        $data_galeri->gambar()->delete();
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
