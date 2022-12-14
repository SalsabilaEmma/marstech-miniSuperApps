<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Footer;
use App\Models\Kontak;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;

use function PHPUnit\Framework\returnCallback;

class ContactController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Kontak';
        $data_kontak = Kontak::latest()->get();
        $data_about = About::where('judul', '=', 'Motto')->get();
        $data_footer = Footer::latest()->get();

        return view('user.contact', compact('data_kontak', 'title', 'data_about', 'data_footer'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'subjek' => 'required',
            'isi' => 'required',
        ]);
        // Kontak::create([
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'subjek' => $request->subjek,
        //     'isi' => $request->isi,
        // ]);
        $data_kontak = new Kontak();
        $data_kontak->id = $request->id;
        $data_kontak->nama = $request->nama;
        $data_kontak->email = $request->email;
        $data_kontak->subjek = $request->subjek;
        $data_kontak->isi = $request->isi;
        // dd($data_kontak);
        // $data_kontak->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengirim Pesan!']);
        // return response()->json([
        //     'data' => $data_kontak
        // ]);
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Kontak';
        $data_kontak = Kontak::latest()->get();
        return view('admin.kontak.list', compact('data_kontak', 'title'));
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
