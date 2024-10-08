<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\UserNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'usn', 'semester', 'branch_id', 'college_id', 'phone', 'role_id', 'image', 'is_alumini',
     'is_admin', 'is_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_verified' => 'boolean',
            'is_alumini' => 'boolean',
        ];
    }

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegisteraion::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Before creating the user, check for image and generate default avatar if necessary
        static::creating(function ($user) {
            if (!$user->image) {
                $user->image = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&color=7F9CF5&background=EBF4FF";
            }
        });

        // Before updating the user, check for image and generate default avatar if necessary
        static::updating(function ($user) {
            if (!$user->image) {
                $user->image = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&color=7F9CF5&background=EBF4FF";
            }
        });

        static::deleting(function ($user) {
            // If the image is not the default avatar, delete it from storage
            if ($user->image && !str_contains($user->image, 'ui-avatars.com')) {
                Storage::disk('public')->delete($user->image);
            }
        });
    }

    protected function afterCreate(): void
    {
        $this->record->notify(new UserNotification($this->record));
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function ambassador()
    {
        return $this->hasOne(Ambassadors::class);
    }
}
