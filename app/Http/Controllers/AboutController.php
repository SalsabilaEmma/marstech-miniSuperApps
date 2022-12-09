<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'About Us';
        $data_about = About::latest()->get();
        return view('admin.about.list', compact('data_about','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // $image = $request->file('file');
        // $judulfile = time() . '.' . $image->getClientOriginalExtension();

        // Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
        //     $constraint->aspectRatio();
        // })->save('image/about/'.$judulfile);
        // $image->move('image/about-original/', $judulfile); // ukuran file asli

        $data_about = new About;
        $data_about->id = $request->id;
        $data_about->judul = $request->judul;
        $data_about->isi = $request->isi;
        // $data_about->file = $judulfile;
        $data_about->save();
        // dd($data_about);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'About Us';
        $data_about = About::find($id);
        // dd($data_about->file);
        return view('admin.about.edit', compact('data_about','title'));
    }

    public function update(Request $request, About $data_about, $id)
    {
        $data_about = About::findOrfail($id);
        $request->validate([
            // 'judul' => 'required',
            'isi' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data_about->update([
            // 'judul'     => $request->judul,
            'isi'   => $request->isi
        ]);
        return redirect()->route('about.list')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
