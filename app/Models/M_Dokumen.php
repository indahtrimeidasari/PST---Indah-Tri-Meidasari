<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Dokumen extends Model
{
    use HasFactory;

    protected $table = 'tb_dokumen';

    protected $fillable = [
        'nama_dokumen',
        'deskripsi',
        'tipe',        // dokumen | foto | video
        'file_path',   // untuk dokumen/foto/video file
        'foto',        // khusus foto
        'video_link',  // link video embed (YouTube, dsb)
    ];
}
