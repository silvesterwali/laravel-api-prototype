<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeePosition
 * 
 * @OA\Schema(
 *   description="Module for help employees data for their position as employees in the office",
 *   type="object"
 * )
 * 
 */
class EmployeePosition extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'position', 'position_code', 'description'];
    public $timestamps = false;
    /**
     * @OA\Property(
     *   title="id",
     *   description="id of table",
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
     *   description="helper to sorting the item for user interface",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $sorting_number;
    /**
     * @OA\Property(
     *   title="position_code",
     *   description="the sort alias of the position",
     *   type="string",
     *   example="HOO"
     * )
     *
     * @var integer
     */
    public $position_code;
    /**
     * @OA\Property(
     *   title="position",
     *   description="the field position user as employee position property",
     *   type="string",
     *   example="Head of operation"
     * )
     *
     * @var string
     */
    public $position;
    /**
     * @OA\Property(
     *   title="description",
     *   description="some information about the position so user will understand how it should be",
     *   type="string",
     *   example="this position is good for mental health.because will have a lot salary to buy plan"
     * )
     *
     * @var string
     */
    public $description;
}
