<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema of employee division table. To provide list division as employee property."
 * )
 * 
 */
class EmployeeDepartment
{
    /**
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $id;

    /**
     * 
     * @var integer
     * 
     * @OA\Property(
     *   example="1000"
     * )
     */
    public $sorting_number;

    /**
     * @var string
     * 
     * @OA\Property(
     *   example="ITD"
     * )
     */
    public $department_code;


    /**
     * @var string
     * 
     * @OA\Property(
     *   example="Information Technology"
     * )
     */
    public $department;

    /**
     * @var string
     * 
     * @OA\Property(
     *   example="This department do much"
     * )
     */
    public $description;
}
