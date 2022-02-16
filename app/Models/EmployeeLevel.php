<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeLevel
 * 
 * @OA\Schema(
 *   description="Model for store list level of saka employees",
 *   type="object"
 * )
 * 
 */
class EmployeeLevel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'level_code', 'level', 'description'];

    /**
     * @OA\Property(
     *   title="id",
     *   description="id of employee level table.",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $id;
    /**
     * @OA\Property(
     *   title="level_code",
     *   description="level code of employee",
     *   type="string",
     *   example="STF"
     * )
     *
     * @var integer
     */
    public $level_code;
    /**
     * @OA\Property(
     *   title="level",
     *   description="level of employee",
     *   type="string",
     *   example="Staff"
     * )
     *
     * @var integer
     */
    public $level;
    /**
     * @OA\Property(
     *   title="description",
     *   description="some description or information of the level",
     *   type="string",
     *   example="Staff"
     * )
     *
     * @var integer
     */
    public $description;
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
}
