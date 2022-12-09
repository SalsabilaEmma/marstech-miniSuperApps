<?php

namespace App\Http\Controllers;

use App\Models\BukaTabungan;
use Illuminate\Http\Request;

class BukaTabunganController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Buka Tabungan';
        return view('user.buka-tabungan', compact('title'));
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
