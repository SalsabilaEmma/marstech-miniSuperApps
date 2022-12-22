<?php

namespace App\Http\Controllers;

use App\Models\BukaDeposito;
use App\Models\Deposito;
use App\Models\Kredit;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class BukaDepositoController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Buka Deposito';
        $data_tabungan = Tabungan::latest()->get();
        $data_deposito = Deposito::latest()->get();
        $data_kredit = Kredit::latest()->get();
        return view('user.buka-deposito', compact('title','data_tabungan','data_deposito','data_kredit'));
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

        if (!File::isDirectory('image/buka-deposito/' . $request->nama)) {
            File::makeDirectory('image/buka-deposito/' . $request->nama);
            File::makeDirectory('image/buka-deposito-original/' . $request->nama);
            /** bikin folder baru tiap upload sesuai id parent */
        }

        $foto = $request->file('foto');
        $judulfoto = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/buka-deposito/' . $request->nama . '/' . $judulfoto);
        $foto->move('image/buka-deposito-original/' . $request->nama . '/' . $judulfoto); // ukuran file asli

        $foto_ktp = $request->file('foto_ktp');
        $judulktp = 'ktp-' . time() . '.' . $foto_ktp->getClientOriginalExtension();
        Image::make($foto_ktp)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/buka-deposito/' . $request->nama . '/' . $judulktp);
        $foto_ktp->move('image/buka-deposito-original/' . $request->nama . '/' . $judulktp); // ukuran file asli

        $data_deposito = new BukaDeposito;
        $data_deposito->nik = $request->nik;
        $data_deposito->nama = $request->nama;
        $data_deposito->no_hp = $request->no_hp;
        $data_deposito->email = $request->email;
        $data_deposito->foto = $judulfoto;
        $data_deposito->foto_ktp = $judulktp;
        $data_deposito->provinsi = $request->provinsi;
        $data_deposito->kab_kota = $request->kab_kota;
        $data_deposito->kecamatan = $request->kecamatan;
        $data_deposito->desa = $request->desa;
        $data_deposito->alamat = $request->alamat;
        $data_deposito->produk_layanan = $request->produk_layanan;
        // dd($data_deposito);
        $data_deposito->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Dikirim!');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Buka Deposito';
        $data_tabungan = Tabungan::latest()->get();
        $data_deposito = Deposito::latest()->get();
        $data_kredit = Kredit::latest()->get();
        return view('admin.deposito.list', compact('title','data_tabungan','data_deposito','data_kredit'));
    }

    public function detail($id)
    {
        $title = 'Buka Deposito';
        $data_deposito = BukaDeposito::findOrFail($id);
        return view('admin.deposito.detail', compact('data_deposito', 'title'));
    }

    public function destroy($id)
    {
        $data_deposito = BukaDeposito::findOrfail($id);
        $data_deposito->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

}
