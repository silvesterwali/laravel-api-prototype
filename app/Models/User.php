<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_active',
        'role',
        'user_group',
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
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    public function telegram()
    {
        return $this->hasOne(UserTelegram::class, 'user_id', 'id');
    }
    /**
     *
     * @var array
     */
    public function user_has_page_sub_menus()
    {
        return $this->hasMany(UserHasPageSubMenu::class, 'user_id', 'id');
    }
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */

    #[SearchUsingPrefix(['username', 'email'])]
    function toSearchableArray()
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
        ];
    }
}
