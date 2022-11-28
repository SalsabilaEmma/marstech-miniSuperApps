<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        return view('user.download');
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Download Area';
        $data_download = Download::latest()->get();
        return view('admin.download-area.list', compact('data_download', 'title'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'judul' => 'required',
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        // ]);

        $data_download = new Download;
        if($request->file()) {
            $file = $request->file('file');
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $file->move(public_path('file/download-area/'), $fileName);

            $data_download->judul = $request->judul;
            $data_download->file = $fileName;
            // dd($data_download);
            $data_download->save();
            return redirect()->back()->with('success','Data Berhasil Ditambahkan!');
        }
    }

    public function edit($id)
    {
        $title = 'Download Area';
        $data_download = Download::find($id);
        return view('admin.download-area.edit', compact('data_download', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data_download = Download::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'file' => 'required'
        ]);
        /** cek file lama*/
        if (File::exists(public_path('file/download-area/' . $data_download->file))) {
            /** delete file lama */
            File::delete(public_path('file/download-area/' . $data_download->file));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload file baru
        if($request->file()) {
            $file = $request->file('file');
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $file->move(public_path('file/download-area/'), $fileName);

            $data_download->judul = $request->judul;
            $data_download->file = $fileName;
            // dd($data_download);
            $data_download->save();
            return redirect()->route('download.list')->with('success','Data Berhasil Diedit!');
        }

    }

    public function destroy($id)
    {
        $data_download = Download::findOrfail($id);
        /** cek file lama*/
        if (File::exists(public_path('file/download-area/' . $data_download->file))) {
            /** delete file lama */
            File::delete(public_path('file/download-area/' . $data_download->file));
            $data_download->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
    }
}
