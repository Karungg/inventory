<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    use HasFactory;

    protected $table = 'products_in';

    protected $fillable = [
        'nama_barang',
        'stok',
        'harga',
    ];
}
