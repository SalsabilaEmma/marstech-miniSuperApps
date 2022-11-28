<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriImage extends Model
{
    use HasFactory;
    protected $table = "galeri_image";
    protected $guarded = [];

    public $timestamps = false;
}
