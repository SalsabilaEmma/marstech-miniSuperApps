<?php

namespace App\Http\Controllers;

use App\Models\PengajuanKredit;
use Illuminate\Http\Request;

class PengajuanKreditController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Pengajuan Kredit';
        return view('user.pengajuan-kredit', compact('title'));
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
