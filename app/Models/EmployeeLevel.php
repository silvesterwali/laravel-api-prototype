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

    protected $fillable = ['sorting_number', 'level_code', 'level', 'description'];

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
     *   title="sorting_number",
     *   description="for sorting the employee level",
     *   type="integer",
     *   example="100"
     * )
     *
     * @var integer
     */
    public $sorting_number;
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
     * @var string
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
     * @var string
     */
    public $description;
    public $timestamps = false;
}