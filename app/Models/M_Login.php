<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class M_Login extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'
    ];

    public function cek_login($email, $password)
    {
        $user = DB::table('users')
            ->where('email', $email)
            ->first();

        if ($user && \Hash::check($password, $user->password)) {
            return $user;
        } else {
            return false;}
    }
}