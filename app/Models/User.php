<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        'password',
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
        'password' => 'hashed',
    ];

    // رابطه چند به چند با Role از طریق جدول role_user
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    // رابطه یک به چند با Vendor
    public function vendors(): HasMany
    {
        return $this->hasMany(Vendor::class);
    }

    // رابطه یک به چند با Order به عنوان خریدار
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }
}
