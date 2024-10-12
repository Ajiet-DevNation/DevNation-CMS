<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccounts extends Model
{
    /** @use HasFactory<\Database\Factories\SocialAccountsFactory> */
    use HasFactory;

    protected $fillable = [
        'github',
        'linkedIn',
        'twitter',
        'facebook',
        'instagram',
        'website',
        'others',
        'is_verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
