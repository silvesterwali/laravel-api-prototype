<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema of employee level table. To provide list level as employee property."
 * )
 * 
 */
class EmployeeLevel
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
     *   example="STF"
     * )
     */
    public $level_code;


    /**
     * @var string
     * 
     * @OA\Property(
     *   example="Staff"
     * )
     */
    public $level;

    /**
     * @var string
     * 
     * @OA\Property(
     *   example="This level do much"
     * )
     */
    public $description;
}
