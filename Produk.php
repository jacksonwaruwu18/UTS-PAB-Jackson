<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Menentukan atribut yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'deskripsi',
        'status',
        'kategori',
    ];
}