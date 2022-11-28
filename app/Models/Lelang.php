<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lelang extends Model
{
    use HasFactory;
    protected $table = 'post_lelang';
    protected $fillable = ['kode_aset', 'judul', 'detail', 'harga', 'lokasi', 'tanggal', 'no_telp', 'foto'];

    public function gambar(): HasMany
    {
        return $this->hasMany(LelangImage::class, 'lelang_id', 'id');
    }
}
