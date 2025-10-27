<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Artikel extends Model
{
    use HasFactory;

    protected $table = 'tb_artikel';
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'isi',
        'penulis',
        'tanggal',
        'gambar',
    ];
}
