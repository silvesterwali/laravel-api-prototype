<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeDepartment
 * 
 * @OA\Schema(
 *   description="EmployeeDepartment is used as available department for employees",
 *   type="object"
 * )
 * 
 */
class EmployeeDepartment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sorting_number', 'department_code', 'department', 'description'];
    /**
     * @OA\Property(
     *   title="id",
     *   description="id of employment table",
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
     *   description="column to for sorting item in table",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $sorting_number;
    /**
     * @OA\Property(
     *   title="department_code",
     *   description="Code for the department",
     *   type="string",
     *   example="ITD"
     * )
     *
     * @var integer
     */
    public $department_code;
    /**
     * @OA\Property(
     *   title="department",
     *   description="department title",
     *   type="string",
     *   example="Information Technology"
     * )
     *
     * @var string
     */
    public $department;
    /**
     * @OA\Property(
     *   title="description",
     *   description="some description for this department",
     *   type="string",
     *   example="this department is so awesome"
     * )
     *
     * @var string
     */
    public $description;
}
