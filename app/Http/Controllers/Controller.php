<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Berita;
use App\Models\Karir;
use App\Models\Lelang;
use App\Models\Pencapaian;
use App\Models\Promo;
use App\Models\Tabungan;
use App\Models\VideoInteraksi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $author = 'Admin BPR Ciki';
        $data_about = About::first();
        $data_berita = Berita::latest()->paginate(3);
        $data_banner = Banner::latest()->get();
        $data_promo = Promo::latest()->get();
        $list_karir = Karir::latest()->paginate(5);
        $data_pencapaian = Pencapaian::latest()->get();
        $data_lelang = Lelang::latest()->paginate(3);
        $data_video = VideoInteraksi::latest()->get();
        // dd($data_lelang->gambar);

        // dd($data_about);
        return view('user.index', compact(
            'author','data_about','data_berita','data_banner','data_promo','list_karir','data_pencapaian','data_lelang','data_video'
        ));
    }
    public function indexSimulasiKredit()
    {
        return view('user.simulasi-kredit');
    }

    // Admin ------------------------------------------------------------------
    public function try()
    {
        return view('try');
    }

    public function indexAdmin()
    {
        return view('admin.index');
    }

    // User Login -------------------------------------------------------------

    public function indexUser()
    {
        return view('user-login.dashboard');
    }
}
