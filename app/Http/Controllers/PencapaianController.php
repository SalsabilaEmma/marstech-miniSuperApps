<?php

namespace App\Http\Controllers;

use App\Models\Pencapaian;
use Illuminate\Http\Request;

class PencapaianController extends Controller
{
    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Pencapaian';
        $data_pencapaian = Pencapaian::latest()->get();
        return view('admin.pencapaian.list', compact('data_pencapaian','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required',
        ]);
        Pencapaian::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('pencapaian.list')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $title = 'Pencapaian';
        $data_pencapaian = Pencapaian::find($id);
        return view('admin.pencapaian.edit', compact('data_pencapaian','title'));
    }

    public function update(Request $request, Pencapaian $data_pencapaian, $id)
    {
        $data_pencapaian = Pencapaian::find($id);
        // dd($data_pencapaian->id);
        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required',
        ]);
        // $data_pencapaian->fill($request->post())->save();
        $data_pencapaian->update([
            'nama'     => $request->nama,
            'jumlah'   => $request->jumlah
        ]);
        return redirect()->route('pencapaian.list')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
