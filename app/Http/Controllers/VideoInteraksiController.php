<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoInteraksi;

class VideoInteraksiController extends Controller
{
    public function index()
    {
        # code... index user
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Video Interaksi';
        $data_video_interaksi = VideoInteraksi::latest()->get();
        return view('admin.video-interaksi.list', compact('title', 'data_video_interaksi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'link' => 'required',
        ]);
        VideoInteraksi::create([
            'judul' => $request->judul,
            'link' => $request->link,
        ]);
        return redirect()->route('video.interaksi.list')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $title = 'Video Interaksi';
        $data_video_interaksi = VideoInteraksi::findOrfail($id);
        return view('admin.video-interaksi.edit', compact('data_video_interaksi','title'));
    }

    public function update(Request $request, VideoInteraksi $data_video_interaksi, $id)
    {
        $data_video_interaksi = VideoInteraksi::findOrfail($id);
        // dd($deposito->id);
        $this->validate($request, [
            'judul' => 'required',
            'link' => 'required',
        ]);
        $data_video_interaksi->update([
            'judul'     => $request->judul,
            'link'   => $request->link
        ]);
        // dd($data_video_interaksi);
        return redirect()->route('video.interaksi.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_video_interaksi = VideoInteraksi::findOrfail($id);
        // Deposito::destroy($id);
        $data_video_interaksi->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

}
