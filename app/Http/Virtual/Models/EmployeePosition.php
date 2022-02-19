<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema of employee position table. To provide list position as employee property."
 * )
 * 
 */
class EmployeePosition
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
     *   example="SQLS"
     * )
     */
    public $position_code;


    /**
     * @var string
     * 
     * @OA\Property(
     *   example="SQL Admin"
     * )
     */
    public $position;

    /**
     * @var string
     * 
     * @OA\Property(
     *   example="This position do much"
     * )
     */
    public $description;
}
