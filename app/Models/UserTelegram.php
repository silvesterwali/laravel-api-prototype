<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserTelegram
 * 
 * @OA\Schema(
 *   description="Model to store all user telegram id.",
 *   type="object"
 * )
 * 
 */
class UserTelegram extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_telegrams';
    protected $dates = ['deleted_at'];

    /**
     * @OA\Property(
     *   title="id",
     *   description="id of user telegram table",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $id;
    /**
     * @OA\Property(
     *   title="id",
     *   description="id of user table",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $user_id;
    /**
     * @OA\Property(
     *   title="telegrams",
     *   description="telegram public id",
     *   type="string",
     *   example="1092342"
     * )
     *
     * @var integer
     */
    public $telegrams;
    /**
     * @OA\Property(
     *   title="created_at",
     *   description="date created  for row record",
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

    /**
     * belong to user model
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
