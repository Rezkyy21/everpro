<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    // Properti yang bisa diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    
    // Atribut yang akan disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang akan dikonversi ke tipe data lain
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function adAccounts()
    {
        return $this->hasMany(AdAccount::class);
    }
}
