<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;
    protected $table = 'karir_admin';
    // protected $fillable = ['nama','tempat_lahir','tanggal','jk','agama','tb','bb','alamat','no_hp','email','status','pendidikan','nama_kampus','fakultas','ipk','prestasi','pengalaman','posisi','cv','foto'];
    protected $fillable = ['judul','isi','file'];
}



