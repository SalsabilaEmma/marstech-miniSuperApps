<?php

namespace App\Http\Controllers;


use App\Models\BukaTabungan;
use App\Models\Deposito;
use App\Models\Kredit;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class BukaTabunganController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Buka Tabungan';
        $data_tabungan = Tabungan::latest()->get();
        $data_deposito = Deposito::latest()->get();
        $data_kredit = Kredit::latest()->get();
        return view('user.buka-tabungan', compact('title', 'data_tabungan', 'data_deposito', 'data_kredit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'produk_layanan' => 'required',
            // 'keterangan' => 'required'
        ]);

        if (!File::isDirectory('image/buka-tabungan/' . $request->nama)) {
            File::makeDirectory('image/buka-tabungan/' . $request->nama);
            File::makeDirectory('image/buka-tabungan-original/' . $request->nama);
            /** bikin folder baru tiap upload sesuai id parent */
        }

        $foto = $request->file('foto');
        $judulfoto = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/buka-tabungan/' . $request->nama . '/' . $judulfoto);
        $foto->move('image/buka-tabungan-original/' . $request->nama . '/' . $judulfoto); // ukuran file asli

        $foto_ktp = $request->file('foto_ktp');
        $judulktp = 'ktp-' . time() . '.' . $foto_ktp->getClientOriginalExtension();
        Image::make($foto_ktp)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/buka-tabungan/' . $request->nama . '/' . $judulktp);
        $foto_ktp->move('image/buka-tabungan-original/' . $request->nama . '/' . $judulktp); // ukuran file asli

        $data_tabungan = new BukaTabungan;
        $data_tabungan->nik = $request->nik;
        $data_tabungan->nama = $request->nama;
        $data_tabungan->no_hp = $request->no_hp;
        $data_tabungan->email = $request->email;
        $data_tabungan->foto = $judulfoto;
        $data_tabungan->foto_ktp = $judulktp;
        $data_tabungan->provinsi = $request->provinsi;
        $data_tabungan->kab_kota = $request->kab_kota;
        $data_tabungan->kecamatan = $request->kecamatan;
        $data_tabungan->desa = $request->desa;
        $data_tabungan->alamat = $request->alamat;
        $data_tabungan->produk_layanan = $request->produk_layanan;
        // dd($data_tabungan);
        $data_tabungan->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Dikirim!');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Buka Tabungan';
        $data_tabungan = BukaTabungan::latest()->get();
        return view('admin.tabungan.list', compact('data_tabungan', 'title'));
    }

    public function detail($id)
    {
        $title = 'Buka Tabungan';
        $data_tabungan = BukaTabungan::findOrFail($id);
        return view('admin.tabungan.detail', compact('data_tabungan', 'title'));
    }

    public function destroy($id)
    {
        $data_tabungan = BukaTabungan::findOrfail($id);
        if (File::exists(public_path('image/buka-tabungan/' . $data_tabungan->nama . '/' . $data_tabungan->foto))) {

            File::delete(public_path('image/buka-tabungan/' . $data_tabungan->nama . '/' . $data_tabungan->foto));
            File::delete(public_path('image/buka-tabungan/' . $data_tabungan->nama . '/' . $data_tabungan->foto_ktp));
            File::delete(public_path('image/buka-tabungan-original/' . $data_tabungan->nama . '/' . $data_tabungan->foto));
            File::delete(public_path('image/buka-tabungan-original/' . $data_tabungan->nama . '/' . $data_tabungan->foto_ktp));
            /** Hapus Folder */
            File::deleteDirectory(public_path('image/buka-tabungan/' . $data_tabungan->nama));
            File::deleteDirectory(public_path('image/buka-tabungan-original/' . $data_tabungan->nama));

            $data_tabungan->delete();
            return redirect()->back()->with('error' , 'Data Berhasil Dihapus!');
        } else {
            return redirect()->back()->with('error' , 'Data Tidak Ditemukan!');
        }
    }
}
