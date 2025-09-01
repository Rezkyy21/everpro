<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// Tambahkan ini
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdCampaign extends Model
{
    use HasFactory;
    
    // Properti yang bisa diisi
    protected $fillable = [
        'account_id',
        'campaign_id',
        'campaign_name',
        'spend',
        'conversions',
        'status'
    ];

    public function adAccount()
    {
        return $this->belongsTo(AdAccount::class, 'account_id');
    }
}
