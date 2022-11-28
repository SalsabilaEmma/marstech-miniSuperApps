<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoInteraksi extends Model
{
    use HasFactory;
    protected $table = 'youtube';
    protected $fillable = ['judul', 'link'];
}
