<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['role', 'name','email','email_verified_at','password','remember_token'];
}
