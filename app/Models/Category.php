<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- TAMBAHKAN INI
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // <--- TAMBAHKAN INI

    protected $fillable = ['name'];
}