<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Kredit;
use App\Models\PengajuanKredit;
use App\Models\Tabungan;
use Illuminate\Http\Request;

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
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
