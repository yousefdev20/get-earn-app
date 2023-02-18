<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\Wallet\EarnedPoints;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int $referred_by
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $birth_date
 * @property string $image
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'birth_date',
        'image',
        'referred_by'
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
    ];

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function visitors(): HasOne
    {
        return $this->hasOne(Visitor::class, 'refereed_by');
    }


    public function referredUsers()
    {
        return DB::select('WITH RECURSIVE referrals_tree AS
        (
        SELECT id, name, email, referred_by, created_at, deleted_at, phone
        FROM users
         WHERE referred_by = ' . $this->id . '
          UNION ALL SELECT u.id, u.name, u.email, u.referred_by, u.created_at, u.deleted_at, u.phone
           FROM users
            u INNER JOIN referrals_tree rt ON u.referred_by = rt.id
             )
             SELECT id, name, email, referred_by, created_at, deleted_at, phone
              FROM referrals_tree
              ');
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url($value),
        );
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['deleted_at'] ? 'blocked' : 'active',
        );
    }

    public function link(): Attribute
    {
        return Attribute::make(
            get: fn() => encrypt($this->phone),
        );
    }
}
