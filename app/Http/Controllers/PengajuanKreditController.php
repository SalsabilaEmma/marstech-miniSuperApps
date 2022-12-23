<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Kredit;
use App\Models\PengajuanKredit;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class PengajuanKreditController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Pengajuan Kredit';
        $data_tabungan = Tabungan::latest()->get();
        $data_deposito = Deposito::latest()->get();
        $data_kredit = Kredit::latest()->get();
        return view('user.pengajuan-kredit', compact('title','data_tabungan','data_deposito','data_kredit'));
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
            'waktu' => 'required',
            'jumlah_pinjaman' => 'required',
            'lama_pinjaman' => 'required',
            'rincian_jaminan' => 'required',
            'foto_jaminan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($request->all());

        if (!File::isDirectory('image/pengajuan-kredit/' . $request->nama)) {
            File::makeDirectory('image/pengajuan-kredit/' . $request->nama);
            File::makeDirectory('image/pengajuan-kredit-original/' . $request->nama);
            /** bikin folder baru tiap upload sesuai id parent */
        }

        /** Foto */
        $foto = $request->file('foto');
        $judulfoto = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/pengajuan-kredit/' . $request->nama . '/' . $judulfoto);
        $foto->move('image/pengajuan-kredit-original/' . $request->nama . '/' . $judulfoto); // ukuran file asli

        /** Foto KTP */
        $foto_ktp = $request->file('foto_ktp');
        $judulktp = 'ktp-' . time() . '.' . $foto_ktp->getClientOriginalExtension();
        Image::make($foto_ktp)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/pengajuan-kredit/' . $request->nama . '/' . $judulktp);
        $foto_ktp->move('image/pengajuan-kredit-original/' . $request->nama . '/' . $judulktp); // ukuran file asli

        /** Foto Jaminan */
        $foto_jaminan = $request->file('foto_jaminan');
        $juduljaminan = 'jaminan-' . time() . '.' . $foto_jaminan->getClientOriginalExtension();
        Image::make($foto_jaminan)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/pengajuan-kredit/' . $request->nama . '/' . $juduljaminan);
        $foto_jaminan->move('image/pengajuan-kredit-original/' . $request->nama . '/' . $juduljaminan); // ukuran file asli

        $data_kredit = new PengajuanKredit();
        $data_kredit->nik = $request->nik;
        $data_kredit->nama = $request->nama;
        $data_kredit->no_hp = $request->no_hp;
        $data_kredit->email = $request->email;
        $data_kredit->foto = $judulfoto;
        $data_kredit->foto_ktp = $judulktp;
        $data_kredit->provinsi = $request->provinsi;
        $data_kredit->kab_kota = $request->kab_kota;
        $data_kredit->kecamatan = $request->kecamatan;
        $data_kredit->desa = $request->desa;
        $data_kredit->alamat = $request->alamat;
        $data_kredit->produk_layanan = $request->produk_layanan;
        $data_kredit->waktu = $request->waktu;
        $data_kredit->jumlah_pinjaman = $request->jumlah_pinjaman;
        $data_kredit->lama_pinjaman = $request->lama_pinjaman;
        $data_kredit->rincian_jaminan = $request->rincian_jaminan;
        $data_kredit->foto_jaminan = $juduljaminan;
        // dd($data_kredit);
        $data_kredit->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Dikirim!');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Pengajuan Kredit';
        $data_kredit = PengajuanKredit::latest()->get();
        return view('admin.kredit.list', compact('data_kredit','title'));
    }

    public function detail($id)
    {
        $title = 'Pengajuan Kredit';
        $data_kredit = PengajuanKredit::findOrFail($id);
        return view('admin.kredit.detail', compact('data_kredit', 'title'));
    }

    public function destroy($id)
    {
        $data_kredit = PengajuanKredit::findOrfail($id);
        $data_kredit->delete();
        return redirect()->back()->with('error' , 'Data Berhasil Dihapus!');
    }
}
