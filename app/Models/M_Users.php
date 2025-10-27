<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'users';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    // Tentukan kolom yang akan disembunyikan (hidden attributes)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tentukan kolom yang akan ditampilkan dalam array atau JSON
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
