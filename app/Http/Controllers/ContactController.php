<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.contact');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Kontak';
        $data_kontak = Kontak::latest()->get();
        return view('admin.kontak.list', compact('data_kontak','title'));
    }

    public function detail($id)
    {
        $title = 'Kontak';
        $data_kontak = Kontak::findOrFail($id);
        return view('admin.kontak.detail', compact('data_kontak', 'title'));
    }

    public function destroy($id)
    {
        $data_kontak = Kontak::findOrfail($id);
        $data_kontak->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

}
