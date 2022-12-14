<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Berita';
        $author = 'Admin BPR Ciki';
        $data_berita = Berita::latest()->paginate(6);
        return view('user.berita', compact('title', 'data_berita', 'author'));
    }
    public function indexBeritaDetail($id)
    {
        $title = 'Berita';
        $author = 'Admin BPR Ciki';
        $list_berita = Berita::latest()->paginate(5);
        $data_berita = Berita::findOrFail($id);
        return view('user.berita-detail', compact('title', 'data_berita', 'author','list_berita'));
    }
    public function listUser()
    {
        # code...
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Berita';
        $data_berita = Berita::latest()->get();
        return view('admin.berita.list', compact('data_berita','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $image = $request->file('file');
        $judulfile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('image/berita/'.$judulfile);
        $image->move('image/berita-original/', $judulfile); // ukuran file asli

        $data_berita = new Berita;
        $data_berita->id = $request->id;
        $data_berita->judul = $request->judul;
        $data_berita->isi = $request->isi;
        $data_berita->file = $judulfile;
        $data_berita->save();
        // dd($data_berita);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'isi' => 'required',
    //         // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);

    //     $isi = $request->isi;
    //     $dom = new \DomDocument();
    //     $dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    //     $imageFile = $dom->getElementsByTagName('imageFile');

    //     foreach($imageFile as $item => $image){
    //         $data = $img->getAttribute('src');
    //         list($type, $data) = explode(';', $data);
    //         list(, $data)      = explode(',', $data);
    //         $imgeData = base64_decode($data);
    //         $image_name= "/berita/" . time().$item.'.png';
    //         $path = public_path() . $image_name;
    //         file_put_contents($path, $imgeData);

    //         $image->removeAttribute('src');
    //         $image->setAttribute('src', $image_name);
    //      }

    //     $isi = $dom->saveHTML();

    //     $data_berita = new Berita;
    //     $data_berita->id = $request->id;
    //     $data_berita->judul = $request->judul;
    //     $data_berita->isi = $request->isi;
    //     // $data_berita->file = $judulfile;
    //     $data_berita->save();
    //     // dd($isi);
    //     return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    // }

    public function edit($id)
    {
        $title = 'Berita';
        $data_berita = Berita::find($id);
        // dd($data_berita->file);
        return view('admin.berita.edit', compact('data_berita','title'));
    }

    public function update(Request $request, Berita $data_berita, $id)
    {
        $data_berita = Berita::findOrfail($id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);
        if(File::exists(public_path('/image/berita/'.$data_berita->file))){
            // delete file lama
            File::delete(public_path('/image/berita/'.$data_berita->file));
            File::delete(public_path('/image/berita-original/'.$data_berita->file));
            // upload file baru
            $image = $request->file('file');
            $namafile = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
                $constraint->aspectRatio();
            })->save('image/berita/'.$namafile);
            $image->move('image/berita-original/', $namafile); // ukuran file asli
            // perubahan judul & file
            $data_berita->judul = $request->judul;
            $data_berita->isi = $request->isi;
            $data_berita->file = $namafile;
            $data_berita->save();
            return redirect()->route('berita.list')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }

        // $data_berita->update([
        //     'judul'     => $request->judul,
        //     'isi'   => $request->isi
        // ]);
        // return redirect()->route('berita.list')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data_berita = Berita::findOrfail($id);
        if(File::exists(public_path('/image/berita/'.$data_berita->file))){
            File::delete(public_path('/image/berita/'.$data_berita->file));
            File::delete(public_path('/image/berita-original/'.$data_berita->file));
            $data_berita->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
    }
}
