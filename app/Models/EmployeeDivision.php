<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeDivision
 * 
 * @OA\Schema(
 *   description="EmployeeDepartment is used as available division for employees",
 *   type="object"
 * )
 * 
 */
class EmployeeDivision extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sorting_number', 'division_code', 'division', 'description'];
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
     *   description="some how the position list will confused the user .so user the sorting_number to help them at their work.",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $sorting_number;
    /**
     * @OA\Property(
     *   title="division_code",
     *   description="the sort alias of the employee division",
     *   type="string",
     *   example="FIN"
     * )
     *
     * @var integer
     */
    public $division_code;
    /**
     * @OA\Property(
     *   title="division",
     *   description="division property",
     *   type="string",
     *   example="Finance"
     * )
     *
     * @var string
     */
    public $division;
    /**
     * @OA\Property(
     *   title="description",
     *   description="division description for some information about the division",
     *   type="string",
     *   example="this division really awesome for long terms"
     * )
     *
     * @var string
     */
    public $description;
}
