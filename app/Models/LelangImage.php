<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LelangImage extends Model
{
    use HasFactory;

    protected $table = "post_lelang_image";
    protected $guarded = [];

    public $timestamps = false;
}
