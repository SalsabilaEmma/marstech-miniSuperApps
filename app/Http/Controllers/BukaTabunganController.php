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
        return view('user.buka-tabungan', compact('title','data_tabungan','data_deposito','data_kredit'));
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
            'keterangan' => 'required'
        ]);

        if (!File::isDirectory('image/buka-tabungan/' . $request->id)) {
            File::makeDirectory('image/buka-tabungan/' . $request->id);  /** bikin folder baru tiap upload sesuai id parent */
        }
        dd('halo');
        $foto = $request->file('foto');
        $judulfoto = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/buka-tabungan/'.$judulfoto);
        $foto->move('image/buka-tabungan-original/', $judulfoto); // ukuran file asli

        // $foto_ktp = $request->file('foto_ktp');
        // $judulfoto = time() . '.' . $foto_ktp->getClientOriginalExtension();
        // Image::make($foto_ktp)->resize(400, 400, function ($constraint) {  // thumbnail
        //     $constraint->aspectRatio();
        // })->save('image/berita/'.$judulfoto);
        // $foto_ktp->move('image/berita-original/', $judulktp); // ukuran file asli

        $data_tabungan = new Tabungan;
        $data_tabungan->nik = $request->nik;
        $data_tabungan->nama = $request->nama;
        $data_tabungan->no_hp = $request->no_hp;
        $data_tabungan->email = $request->email;
        $data_tabungan->foto = $judulfoto;
        // $data_tabungan->foto_ktp = $judulktp;
        $data_tabungan->provinsi = $request->provinsi;
        $data_tabungan->kab_kota = $request->kab_kota;
        $data_tabungan->kecamatan = $request->kecamatan;
        $data_tabungan->desa = $request->desa;
        $data_tabungan->alamat = $request->alamat;
        $data_tabungan->produk_layanan = $request->produk_layanan;
        $data_tabungan->keterangan = $request->keterangan;
        // dd($data_tabungan);
        $data_tabungan->save();
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Buka Tabungan';
        $data_tabungan = BukaTabungan::latest()->get();
        return view('admin.tabungan.list', compact('data_tabungan','title'));
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
        $data_tabungan->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
