<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema of employee religion table. To provide list religion as employee property."
 * )
 * 
 */
class EmployeeReligion
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
     * @var string
     * 
     * @OA\Property(
     *   example="HINDU"
     * )
     */
    public $religion;
}
