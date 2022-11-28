<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lelang;
use App\Models\LelangImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class LelangController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.lelang');
    }
    public function indexLelangDetail()
    {
        return view('user.lelang-detail');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Lelang';
        $data_lelang = Lelang::latest()->get();
        return view('admin.lelang.list', compact('data_lelang', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required',
            'judul' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'no_telp' => 'required',
        ]);
        $images = $request->file('foto');
        $data_foto = [];

        // dd($namafile);
        $data = new Lelang;
        // $data->id = $request->id;
        $data->kode_aset = $request->kode_aset;
        $data->judul = $request->judul;
        $data->detail = $request->detail;
        $data->harga = $request->harga;
        $data->lokasi = $request->lokasi;
        $data->tanggal = $request->tanggal;
        $data->no_telp = $request->no_telp;
        $data->foto = json_encode($data_foto);
        $data->save();
        foreach ($images as $key => $image) {
            $namafile = time() . $key + 1 . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400, function ($constraint) {
                /** thumbnail */
                $constraint->aspectRatio();
            })->save('image/lelang/' . $namafile);
            $image->move('image/lelang-original/', $namafile);
            /** ukuran file asli */
            array_push($data_foto, $namafile);

            $data->gambar()->create([
                "gambar" => $namafile
            ]);
        }
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Lelang';
        $data_lelang = Lelang::find($id);
        return view('admin.lelang.edit', compact('data_lelang', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data_lelang = Lelang::findOrfail($id);
        // dd($data_lelang);
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
        // $data = json_decode($data_lelang->foto);
        //     if (File::exists(public_path('/image/lelang/' . $foto))) {
        //         // delete file lama
        //         File::delete(public_path('/image/lelang/' . $foto));
        //         File::delete(public_path('/image/lelang-original/' . $foto));
        //     }
        // }
        // upload file baru
        $images = $request->file('foto');
        $data_foto = [];

        $data_lelang->kode_aset = $request->kode_aset;
        $data_lelang->judul = $request->judul;
        $data_lelang->detail = $request->detail;
        $data_lelang->harga = $request->harga;
        $data_lelang->lokasi = $request->lokasi;
        $data_lelang->tanggal = $request->tanggal;
        $data_lelang->no_telp = $request->no_telp;
        // $data_lelang->foto = json_encode($data_foto);
        $data_lelang->foto = " ";
        $data_lelang->save();
        /** Kondisi tambah data baru saat edit */
        if ( $images != NULL ) {
            foreach ($images as $key => $image) {
                $namafile = time() . $key + 1 . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(400, 400, function ($constraint) {
                    /** thumbnail */
                    $constraint->aspectRatio();
                })->save('image/lelang/' . $namafile);
                $image->move('image/lelang-original/', $namafile);
                /** ukuran file asli */
                array_push($data_foto, $namafile);
                /** create file sesuai id */
                $data_lelang->gambar()->create([
                    "gambar" => $namafile
                ]);
            }
        }
        return redirect()->route('lelang.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_lelang = Lelang::findOrfail($id);
        $data_lelang->delete();
        $data_lelang->gambar()->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

    public function delete($id)
    {
        /** Hapus file di direktori */
        $data_lelang = LelangImage::findOrfail($id);
        $foto = $data_lelang->gambar;
        File::delete(public_path('/image/lelang/' . $foto));
        File::delete(public_path('/image/lelang-original/' . $foto));
        /** Hapus data file dengan id lelang terkait */
        LelangImage::destroy($id);
        return [
            "status" => true,
            "id" => $id,
        ];
    }
}
