<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @OA\Schema(
 *   description="User Model for all authenticated users",
 *   type="object"
 * )
 * 
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

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
     * @OA\Property(
     *   title="id",
     *   description="id of user",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $id;
    /**
     * @OA\Property(
     *   title="username",
     *   description="username for user",
     *   type="string",
     *   example="beautiful"
     * )
     *
     * @var string
     */
    public $username;
    /**
     * @OA\Property(
     *   title="email",
     *   description="email of user",
     *   type="string",
     *   example="beautiful@pt-saa.com"
     * )
     *
     * @var string
     */
    public $email;
    /**
     * @OA\Property(
     *   title="role",
     *   description="role for user access level",
     *   type="string",
     *   example="user"
     * )
     *
     * @var string
     */
    public $role;
    /**
     * @OA\Property(
     *   title="user_group",
     *   description="default user group from user",
     *   type="string",
     *   example="EDP"
     * )
     *
     * @var string
     */
    public $user_group;
    /**
     * @OA\Property(
     *   title="is_active",
     *   description="check the user is active",
     *   example="1",
     *   type="integer"
     * )
     *
     * @var string
     */
    public $is_active;
    /**
     * @OA\Property(
     *   title="email_verified_at",
     *   description="check email verification date",
     *   format="datetime",
     *   example="2022-02-14 17:50:45",
     *   type="string"
     * )
     *
     * @var string
     */
    public $email_verified_at;
    /**
     * @OA\Property(
     *   title="created_at",
     *   description="date created for row record",
     *   format="datetime",
     *   example="2022-02-14 17:50:45",
     *   type="string"
     * )
     *
     * @var string
     */
    public $created_at;
    /**
     * @OA\Property(
     *   title="updated_at",
     *   description="date updated for row record",
     *   format="datetime",
     *   example="2022-02-14 17:50:45",
     *   type="string"
     * )
     *
     * @var string
     */
    public $updated_at;
    /**
     * @OA\Property(
     *   title="deleted_at",
     *   description="date deleted for row record apply soft deleted",
     *   format="datetime",
     *   example="2022-02-14 17:50:45",
     *   type="string"
     * )
     *
     * @var string
     */
    public $deleted_at;

    public function telegram()
    {
        return $this->hasOne(UserTelegram::class, 'user_id', 'id');
    }
}
