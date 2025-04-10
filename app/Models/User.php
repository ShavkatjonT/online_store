<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use  HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function paymentCards(): HasMany
    {
        return $this->hasMany(UserPaymentCards::class);
    }

    public function settings(): HasMany
    {
        return $this->hasMany(UserSetting::class, 'user_id', 'id');
    }
    public function hasFavorite($favorites_id): bool
    {
        return $this->favorites()->where('product_id', $favorites_id)->exists();
    }
    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
