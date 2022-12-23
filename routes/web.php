<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VismisController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\DireksiController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\JaringanKantorController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BukaTabunganController;
use App\Http\Controllers\BukaDepositoController;
use App\Http\Controllers\PengajuanKreditController;
use App\Http\Controllers\ProdukTabunganController;
use App\Http\Controllers\ProdukDepositoController;
use App\Http\Controllers\ProdukKreditController;
use App\Http\Controllers\PromoController;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AssyncController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PencapaianController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\VideoInteraksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('/try', [Controller::class, 'try'])->name('try');
/** ------------------------------------------ USER -------------------------------------------------------- */
Route::GET('/', [Controller::class, 'index'])->name('index');

/** Kontak ................................................................................................. */
Route::GET('/kontak', [ContactController::class, 'index'])->name('contact');
Route::POST('/kontak/store', [ContactController::class, 'store'])->name('kontak.store');

/** Visi Misi .............................................................................................. */
Route::GET('/visi-misi', [VismisController::class, 'index'])->name('vismis');

/** Sejarah ................................................................................................ */
Route::GET('/sejarah', [SejarahController::class, 'index'])->name('sejarah');

/** Direksi ................................................................................................ */
Route::GET('/direksi', [DireksiController::class, 'index'])->name('direksi');

/** Penghargaan ............................................................................................ */
Route::GET('/penghargaan', [PenghargaanController::class, 'index'])->name('penghargaan');

/** Jaringan Kantor ........................................................................................ */
Route::GET('/jaringan-kantor', [JaringanKantorController::class, 'index'])->name('jaringan.kantor');

/** Karir .................................................................................................. */
Route::GET('/karir', [KarirController::class, 'index'])->name('karir');
Route::GET('/karir-detail/{id?}', [KarirController::class, 'indexKarirDetail'])->name('karir.detail');

/** Berita ................................................................................................. */
Route::GET('/berita', [BeritaController::class, 'index'])->name('berita');
Route::GET('/berita/show', [BeritaController::class, 'listUser'])->name('list.user');
Route::GET('/berita-detail/{id?}', [BeritaController::class, 'indexBeritaDetail'])->name('berita.detail');

/** Lelang ................................................................................................. */
Route::GET('/lelang', [LelangController::class, 'index'])->name('lelang');
Route::GET('/lelang-detail/{id?}', [LelangController::class, 'indexLelangDetail'])->name('lelang.detail');

/** Edukasi ................................................................................................ */
Route::GET('/edukasi', [EdukasiController::class, 'index'])->name('edukasi');
Route::GET('/edukasi/show/{id?}', [EdukasiController::class, 'show'])->name('edukasi.show');

/** Galeri ................................................................................................. */
Route::GET('/galeri', [GaleriController::class, 'index'])->name('galeri');

/** Download Area .......................................................................................... */
Route::GET('/download-area', [DownloadController::class, 'index'])->name('download');
Route::GET('/download-area/download/{id?}', [DownloadController::class, 'downloadFile'])->name('download.downloadFile');

/** Laporan ................................................................................................ */
Route::GET('/laporan', [LaporanController::class, 'index'])->name('laporan');

/** Simulasi Kredit ........................................................................................ */
Route::GET('/simulasi-kredit', [Controller::class, 'indexSimulasiKredit'])->name('simulasi.kredit');

/** Buka Tabungan .......................................................................................... */
Route::GET('/buka-tabungan', [BukaTabunganController::class, 'index'])->name('buka.tabungan');
Route::POST('/buka-tabungan/store', [BukaTabunganController::class, 'store'])->name('buka.tabungan.store');

/** Buka Deposito .......................................................................................... */
Route::GET('/buka-deposito', [BukaDepositoController::class, 'index'])->name('buka.deposito');
Route::POST('/buka-deposito/store', [BukaDepositoController::class, 'store'])->name('buka.deposito.store');

/** Pengajuan Kredit ....................................................................................... */
Route::GET('/pengajuan-kredit', [PengajuanKreditController::class, 'index'])->name('pengajuan.kredit');
Route::POST('/buka-kredit/store', [PengajuanKreditController::class, 'store'])->name('buka.kredit.store');

/** Produk ................................................................................................. */
Route::GET('/produk-tabungan/{id?}', [ProdukTabunganController::class, 'produk'])->name('produk.tabungan');
Route::GET('/produk-deposito/{id?}', [ProdukDepositoController::class, 'index'])->name('produk.deposito');
Route::GET('/produk-kredit/{id?}', [ProdukKreditController::class, 'index'])->name('produk.kredit');

/** Subscribe ............................................................................................... */
Route::POST('/', [SubscribeController::class, 'store'])->name('subscribe.store');

/** -------------------------------------------------------------------------------------------------- Wilayah */
Route::GET('/provinsi', [AssyncController::class, 'provinsi'])->name('provinsi');
Route::GET('/distrik', [AssyncController::class, 'distrik'])->name('distrik');
Route::GET('/kecamatan', [AssyncController::class, 'kecamatan'])->name('kecamatan');
Route::GET('/desa', [AssyncController::class, 'desa'])->name('desa');
/** -------------------------------------------------------------------------------------------------- End Wilayah */

/** Login Google ............................................................................................. */
Route::prefix('google')->name('google.')->group(function () {
    Route::GET('auth', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callBackFromGoogle'])->name('callback');
});

/** ------------------------------------------ ADMIN -------------------------------------------------------- */
Route::middleware(['auth', 'admin'])->group(function () {
    Route::GET('/dashboard', [Controller::class, 'indexAdmin'])->name('dashboard');
    /** --------------------------------------------------------------------------------------------- Calon Nasabah Dropdown */
    /** Pengajuan Buka Deposito ...................................................................................... */
    Route::GET('/buka-deposito/list', [BukaDepositoController::class, 'list'])->name('buka.deposito.list');
    Route::GET('/buka-deposito/detail/{id?}', [BukaDepositoController::class, 'detail'])->name('buka.deposito.detail');
    Route::DELETE('/buka-deposito/delete/{id?}', [BukaDepositoController::class, 'destroy'])->name('buka.deposito.destroy');
    /** Pengajuan Buka Tabungan ...................................................................................... */
    Route::GET('/buka-tabungan/list', [BukaTabunganController::class, 'list'])->name('buka.tabungan.list');
    Route::GET('/buka-tabungan/detail/{id?}', [BukaTabunganController::class, 'detail'])->name('buka.tabungan.detail');
    Route::DELETE('/buka-tabungan/delete/{id?}', [BukaTabunganController::class, 'destroy'])->name('buka.tabungan.destroy');
    /** Pengajuan Kredit ...................................................................................... */
    Route::GET('/buka-kredit/list', [PengajuanKreditController::class, 'list'])->name('buka.kredit.list');
    Route::GET('/buka-kredit/detail/{id?}', [PengajuanKreditController::class, 'detail'])->name('buka.kredit.detail');
    Route::DELETE('/buka-kredit/delete/{id?}', [PenghargaanController::class, 'destroy'])->name('buka.kredit.destroy');
    /** --------------------------------------------------------------------------------------------- End Calon Nasabah Dropdown */

    /** Kontak ...................................................................................... */
    Route::GET('/kontak/list', [ContactController::class, 'list'])->name('kontak.list');
    Route::GET('/kontak/detail/{id?}', [ContactController::class, 'detail'])->name('kontak.detail');
    Route::DELETE('/kontak/delete/{id?}', [ContactController::class, 'destroy'])->name('kontak.destroy');
    /** Subscriber ...................................................................................... */
    Route::GET('/subscribe/list', [SubscribeController::class, 'list'])->name('subscribe.list');
    Route::GET('/subscribe/detail/{id?}', [SubscribeController::class, 'detail'])->name('subscribe.detail');
    Route::DELETE('/subscribe/delete/{id?}', [SubscribeController::class, 'destroy'])->name('subscribe.destroy');

    /** -------------------------------------------------------------------------------------------------- Produkk Dropdown */
    /** Produk Deposito ............................................................................................. */
    Route::GET('/produk-deposito/list', [ProdukDepositoController::class, 'list'])->name('produk.deposito.list');
    Route::POST('/produk-deposito/store', [ProdukDepositoController::class, 'store'])->name('produk.deposito.store');
    Route::GET('/produk-deposito/edit/{id?}', [ProdukDepositoController::class, 'edit'])->name('produk.deposito.edit');
    Route::POST('/produk-deposito/update/{id?}', [ProdukDepositoController::class, 'update'])->name('produk.deposito.update');
    Route::DELETE('/produk-deposito/delete/{id?}', [ProdukDepositoController::class, 'destroy'])->name('produk.deposito.destroy');
    /** Produk Tabungan ............................................................................................. */
    Route::GET('/produk-tabungan/list', [ProdukTabunganController::class, 'list'])->name('produk.tabungan.list');
    Route::POST('/produk-tabungan/store', [ProdukTabunganController::class, 'store'])->name('produk.tabungan.store');
    Route::GET('/produk-tabungan/edit/{id?}', [ProdukTabunganController::class, 'edit'])->name('produk.tabungan.edit');
    Route::POST('/produk-tabungan/update/{id?}', [ProdukTabunganController::class, 'update'])->name('produk.tabungan.update');
    Route::DELETE('/produk-tabungan/delete/{id?}', [ProdukTabunganController::class, 'destroy'])->name('produk.tabungan.destroy');
    /** Produk Kredit ............................................................................................. */
    Route::GET('/produk-kredit/list', [ProdukKreditController::class, 'list'])->name('produk.kredit.list');
    Route::POST('/produk-kredit/store', [ProdukKreditController::class, 'store'])->name('produk.kredit.store');
    Route::GET('/produk-kredit/edit/{id?}', [ProdukKreditController::class, 'edit'])->name('produk.kredit.edit');
    Route::POST('/produk-kredit/update/{id?}', [ProdukKreditController::class, 'update'])->name('produk.kredit.update');
    Route::DELETE('/produk-kredit/delete/{id?}', [ProdukKreditController::class, 'destroy'])->name('produk.kredit.destroy');
    /** -------------------------------------------------------------------------------------------------- End Produk Dropdown */

    /** Banner ............................................................................................. */
    Route::GET('/banner/list', [BannerController::class, 'list'])->name('banner.list');
    Route::POST('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::GET('/banner/edit/{id?}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::POST('/banner/update/{id?}', [BannerController::class, 'update'])->name('banner.update');
    Route::DELETE('/banner/delete/{id?}', [BannerController::class, 'destroy'])->name('banner.destroy');
    // Video Interaksi ....................................................................................
    Route::GET('/video-interaksi/list', [VideoInteraksiController::class, 'list'])->name('video.interaksi.list');
    Route::POST('/video-interaksi/store', [VideoInteraksiController::class, 'store'])->name('video.interaksi.store');
    Route::GET('/video-interaksi/edit/{id?}', [VideoInteraksiController::class, 'edit'])->name('video.interaksi.edit');
    Route::POST('/video-interaksi/update/{id?}', [VideoInteraksiController::class, 'update'])->name('video.interaksi.update');
    Route::DELETE('/video-interaksi/delete/{id?}', [VideoInteraksiController::class, 'destroy'])->name('video.interaksi.destroy');

    /** -------------------------------------------------------------------------------------------------- Informasi Dropdown */
    /** Berita ............................................................................................. */
    Route::GET('/berita/list', [BeritaController::class, 'list'])->name('berita.list');
    Route::POST('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::GET('/berita/edit/{id?}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::POST('/berita/update/{id?}', [BeritaController::class, 'update'])->name('berita.update');
    Route::DELETE('/berita/delete/{id?}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    /** Lelang ............................................................................................. */
    Route::GET('/lelang/list', [LelangController::class, 'list'])->name('lelang.list');
    Route::POST('/lelang/store', [LelangController::class, 'store'])->name('lelang.store');
    Route::GET('/lelang/edit/{id?}', [LelangController::class, 'edit'])->name('lelang.edit');
    Route::PUT('/lelang/update/{id?}', [LelangController::class, 'update'])->name('lelang.update');
    Route::DELETE('/lelang/delete/{id?}', [LelangController::class, 'destroy'])->name('lelang.destroy');
    Route::DELETE('/lelang/destroy/{id?}', [LelangController::class, 'delete'])->name('lelang.delete');
    /** Edukasi ............................................................................................. */
    Route::GET('/edukasi/list', [EdukasiController::class, 'list'])->name('edukasi.list');
    Route::POST('/edukasi/store', [EdukasiController::class, 'store'])->name('edukasi.store');
    Route::GET('/edukasi/edit/{id?}', [EdukasiController::class, 'edit'])->name('edukasi.edit');
    Route::POST('/edukasi/update/{id?}', [EdukasiController::class, 'update'])->name('edukasi.update');
    Route::DELETE('/edukasi/delete/{id?}', [EdukasiController::class, 'destroy'])->name('edukasi.destroy');
    /** Gallery ............................................................................................. */
    Route::GET('/galeri/list', [GaleriController::class, 'list'])->name('galeri.list');
    Route::POST('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::GET('/galeri/edit/{id?}', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::PUT('/galeri/update/{id?}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::DELETE('/galeri/delete/{id?}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    Route::DELETE('/galeri/destroy/{id?}', [GaleriController::class, 'delete'])->name('galeri.delete');
    /** Download Area ........................................................................................ */
    Route::GET('/download/list', [DownloadController::class, 'list'])->name('download.list');
    Route::POST('/download/store', [DownloadController::class, 'store'])->name('download.store');
    Route::GET('/download/edit/{id?}', [DownloadController::class, 'edit'])->name('download.edit');
    Route::POST('/download/update/{id?}', [DownloadController::class, 'update'])->name('download.update');
    Route::DELETE('/download/delete/{id?}', [DownloadController::class, 'destroy'])->name('download.destroy');
    /** -------------------------------------------------------------------------------------------------- End Informasi Dropdown */

    /** Karir ............................................................................................. */
    Route::GET('/karir/list', [KarirController::class, 'list'])->name('karir.list');
    Route::POST('/karir/store', [KarirController::class, 'store'])->name('karir.store');
    Route::GET('/karir/edit/{id?}', [KarirController::class, 'edit'])->name('karir.edit');
    Route::POST('/karir/update/{id?}', [KarirController::class, 'update'])->name('karir.update');
    Route::DELETE('/karir/delete/{id?}', [KarirController::class, 'destroy'])->name('karir.destroy');
    /** Promo ............................................................................................. */
    Route::GET('/promo/list', [PromoController::class, 'list'])->name('promo.list');
    Route::POST('/promo/store', [PromoController::class, 'store'])->name('promo.store');
    Route::GET('/promo/edit/{id?}', [PromoController::class, 'edit'])->name('promo.edit');
    Route::POST('/promo/update/{id?}', [PromoController::class, 'update'])->name('promo.update');
    Route::DELETE('/promo/delete/{id?}', [PromoController::class, 'destroy'])->name('promo.destroy');
    /** Jumlah Pencapaian ............................................................................................. */
    Route::GET('/pencapaian/list', [PencapaianController::class, 'list'])->name('pencapaian.list');
    Route::POST('/pencapaian/store', [PencapaianController::class, 'store'])->name('pencapaian.store');
    Route::GET('/pencapaian/edit/{id?}', [PencapaianController::class, 'edit'])->name('pencapaian.edit');
    Route::POST('/pencapaian/update/{id?}', [PencapaianController::class, 'update'])->name('pencapaian.update');
    Route::DELETE('/pencapaian/delete/{id?}', [PencapaianController::class, 'destroy'])->name('pencapaian.destroy');
    /** Laporan ............................................................................................. */
    Route::GET('/laporan/list', [LaporanController::class, 'list'])->name('laporan.list');
    Route::POST('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
    Route::GET('/laporan/edit/{id?}', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::POST('/laporan/update/{id?}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::DELETE('/laporan/delete/{id?}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    /** ------------------------------------------------------------------------------------------ Tentang Kami Dropdown */
    /** About Us ............................................................................................. */
    Route::GET('/about/list', [AboutController::class, 'list'])->name('about.list');
    Route::POST('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::GET('/about/edit/{id?}', [AboutController::class, 'edit'])->name('about.edit');
    Route::POST('/about/update/{id?}', [AboutController::class, 'update'])->name('about.update');
    /** Sejarah ............................................................................................. */
    Route::GET('/sejarah/list', [SejarahController::class, 'list'])->name('sejarah.list');
    Route::POST('/sejarah/store', [SejarahController::class, 'store'])->name('sejarah.store');
    Route::GET('/sejarah/edit/{id?}', [SejarahController::class, 'edit'])->name('sejarah.edit');
    Route::POST('/sejarah/update/{id?}', [SejarahController::class, 'update'])->name('sejarah.update');
    Route::DELETE('/sejarah/delete/{id?}', [SejarahController::class, 'destroy'])->name('sejarah.destroy');
    /** Visi Misi ............................................................................................. */
    Route::GET('/vismis/list', [VismisController::class, 'list'])->name('vismis.list');
    Route::POST('/vismis/store', [VismisController::class, 'store'])->name('vismis.store');
    Route::GET('/vismis/edit/{id?}', [VismisController::class, 'edit'])->name('vismis.edit');
    Route::POST('/vismis/update/{id?}', [VismisController::class, 'update'])->name('vismis.update');
    Route::DELETE('/vismis/delete/{id?}', [VismisController::class, 'destroy'])->name('vismis.destroy');
    /** Penghargaan ............................................................................................. */
    Route::GET('/penghargaan/list', [PenghargaanController::class, 'list'])->name('penghargaan.list');
    Route::POST('/penghargaan/store', [PenghargaanController::class, 'store'])->name('penghargaan.store');
    Route::GET('/penghargaan/edit/{id?}', [PenghargaanController::class, 'edit'])->name('penghargaan.edit');
    Route::POST('/penghargaan/update/{id?}', [PenghargaanController::class, 'update'])->name('penghargaan.update');
    Route::DELETE('/penghargaan/delete/{id?}', [PenghargaanController::class, 'destroy'])->name('penghargaan.destroy');
    /** Jaringan Kantor ............................................................................................. */
    Route::GET('/jaringan-kantor/list', [JaringanKantorController::class, 'list'])->name('jaringan.list');
    Route::POST('/jaringan-kantor/store', [JaringanKantorController::class, 'store'])->name('jaringan.store');
    Route::GET('/jaringan-kantor/edit/{id?}', [JaringanKantorController::class, 'edit'])->name('jaringan.edit');
    Route::POST('/jaringan-kantor/update/{id?}', [JaringanKantorController::class, 'update'])->name('jaringan.update');
    Route::DELETE('/jaringan-kantor/delete/{id?}', [JaringanKantorController::class, 'destroy'])->name('jaringan.destroy');
    /** Direksi ............................................................................................. */
    Route::GET('/direksi/list', [DireksiController::class, 'list'])->name('direksi.list');
    Route::POST('/direksi/store', [DireksiController::class, 'store'])->name('direksi.store');
    Route::GET('/direksi/edit/{id?}', [DireksiController::class, 'edit'])->name('direksi.edit');
    Route::POST('/direksi/update/{id?}', [DireksiController::class, 'update'])->name('direksi.update');
    Route::DELETE('/direksi/delete/{id?}', [DireksiController::class, 'destroy'])->name('direksi.destroy');
    /** Footer ............................................................................................. */
    Route::GET('/footer/list', [FooterController::class, 'list'])->name('footer.list');
    Route::POST('/footer/store', [FooterController::class, 'store'])->name('footer.store');
    Route::GET('/footer/edit/{id?}', [FooterController::class, 'edit'])->name('footer.edit');
    Route::POST('/footer/update/{id?}', [FooterController::class, 'update'])->name('footer.update');
    Route::DELETE('/footer/delete/{id?}', [FooterController::class, 'destroy'])->name('footer.destroy');
    /** ------------------------------------------------------------------------------------------ End Tentang Kami Dropdown */

    /** User Account ............................................................................................. */
    Route::GET('/user-account/list', [UserAccountController::class, 'list'])->name('user.account.list');
    Route::POST('/user-account/store', [UserAccountController::class, 'store'])->name('user.account.store');
    Route::GET('/user-account/edit/{id?}', [UserAccountController::class, 'edit'])->name('user.account.edit');
    Route::POST('/user-account/update/{id?}', [UserAccountController::class, 'update'])->name('user.account.update');
    Route::DELETE('/user-account/delete/{id?}', [UserAccountController::class, 'destroy'])->name('user.account.destroy');
});







// User Login -----------------------------------------------------------------------------------------------------
Route::middleware(['auth', 'user.login'])->group(function () {
    // return view('dashboard');
    Route::GET('/user', [Controller::class, 'indexUser'])->name('indexuser');
});

require __DIR__ . '/auth.php';
