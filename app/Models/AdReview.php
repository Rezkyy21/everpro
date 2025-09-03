<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ad_account_id',
        'campaign_name',
        'creative_image',
        'creative_text',
        'status',
        'notes',
    ];

    /**
     * Get the user that owns the ad review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ad account associated with the ad review.
     */
    public function adAccount()
    {
        return $this->belongsTo(AdAccount::class);
    }
}
