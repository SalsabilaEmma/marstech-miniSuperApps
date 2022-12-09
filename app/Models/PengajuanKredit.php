<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKredit extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_kredit_online_form';
    protected $fillable = ['nik','nama','no_hp','email','foto','foto_ktp','provinsi','kab_kota','kecamatan','desa','alamat','produk_layanan','kantor_kas','penjelasan','tanggal','jumlah_pinjaman','lama_pinjaman','rincian_jaminan','foto_jaminan','waktu'];
}
