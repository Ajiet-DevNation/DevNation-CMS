<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'state', 'country'];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
