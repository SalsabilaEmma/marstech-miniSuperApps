<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JaringanKantor extends Model
{
    use HasFactory;
    protected $table = 'jaringan';
    protected $fillable = ['judul', 'isi','tanggal'];
}
