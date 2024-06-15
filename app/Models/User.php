<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'profile_image',
        'subscription_id'
        
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'interests' => 'array',
    ];
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function isCoach()
    {
        return $this->role === 'coach';
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    // Define the relationship for users who are coaches
    public function coachedSession()
    {
        return $this->hasMany(Session::class, 'coach_id');
    }

    // Define the relationship for users who have appointments
    public function userSession()
    {
        return $this->hasMany(Session::class, 'user_id');
    }

    // Scope to filter users by role
    public function scopeCoaches($query)
    {
        return $query->where('role', 'coach');
    }

    public function scopeUsers($query)
    {
        return $query->where('role', 'user');
    }
}
