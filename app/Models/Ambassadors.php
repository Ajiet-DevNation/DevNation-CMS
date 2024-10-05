<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambassadors extends Model
{
    /** @use HasFactory<\Database\Factories\AmbassadorsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'developer_group_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'name' => 'string',
        'user_id' => 'integer',
        'developer_group_id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function developerGroup()
    {
        return $this->belongsTo(DeveloperGroup::class);
    }
}
