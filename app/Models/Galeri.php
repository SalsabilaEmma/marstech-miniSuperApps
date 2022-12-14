<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $fillable = ['judul','file'];

    // public function gambar(): HasMany
    // {
    //     return $this->hasMany(GaleriImage::class, 'galeri_id', 'id');
    // }
}
