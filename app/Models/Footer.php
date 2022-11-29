<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'tentang_kami';
    protected $fillable = ['judul', 'isi','alamat_lengkap','no_telp','lokasi','email'];
}
