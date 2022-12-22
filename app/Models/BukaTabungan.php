<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukaTabungan extends Model
{
    use HasFactory;
    protected $table = 'buka_tabungan_form';
    protected $fillable = [
        'nik', 'nama', 'no_hp', 'email', 'foto', 'foto_ktp',
        'provinsi', 'kab_kota', 'kecamatan', 'desa', 'alamat', 'produk_layanan', 'kantor_kas', 'penjelasan', 'keterangan'
    ];
}
