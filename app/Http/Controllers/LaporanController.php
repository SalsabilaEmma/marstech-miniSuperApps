<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.laporan');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Laporan';
        $data_laporan = Laporan::latest()->get();
        return view('admin.laporan.list', compact('data_laporan', 'title'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $data_laporan = new Laporan;
        if($request->file()) {
            $file = $request->file('file');
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $file->move(public_path('file/laporan/'), $fileName);

            $data_laporan->judul = $request->judul;
            $data_laporan->bulan = $request->bulan;
            $data_laporan->tahun = $request->tahun;
            $data_laporan->file = $fileName;
            // dd($data_laporan);
            $data_laporan->save();
            return redirect()->back()->with('success','Data Berhasil Ditambahkan!');
        }
    }

    public function edit($id)
    {
        $title = 'Laporan';
        $data_laporan = Laporan::find($id);
        return view('admin.laporan.edit', compact('data_laporan', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data_laporan = Laporan::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'file' => 'required'
        ]);
        /** cek file lama*/
        if (File::exists(public_path('file/laporan/' . $data_laporan->file))) {
            /** delete file lama */
            File::delete(public_path('file/laporan/' . $data_laporan->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        if($request->file()) {
            $file = $request->file('file');
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $file->move(public_path('file/laporan/'), $fileName);

            $data_laporan->judul = $request->judul;
            $data_laporan->bulan = $request->bulan;
            $data_laporan->tahun = $request->tahun;
            $data_laporan->file = $fileName;
            // dd($data_laporan);
            $data_laporan->save();
            return redirect()->route('laporan.list')->with('success','Data Berhasil Diedit!');
        }

    }

    public function destroy($id)
    {
        $data_laporan = Laporan::findOrfail($id);
        /** cek file lama*/
        if (File::exists(public_path('file/laporan/' . $data_laporan->file))) {
            /** delete file lama */
            File::delete(public_path('file/laporan/' . $data_laporan->file));
            $data_laporan->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
    }
}
