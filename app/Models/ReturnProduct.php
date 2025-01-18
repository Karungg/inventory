<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;

    protected $table = 'returns_product';

    protected $fillable = [
        'nama_barang',
        'nama_retur',
    ];
}
