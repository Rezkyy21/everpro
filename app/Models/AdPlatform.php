<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// Tambahkan ini
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdPlatform extends Model
{
    use HasFactory;

    // Properti yang bisa diisi
    protected $fillable = [
        'name',
        'description'
    ];

    public function adAccounts()
    {
        return $this->hasMany(AdAccount::class);
    }
}