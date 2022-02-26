<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema of employee level table. To provide list education option for employee property."
 * )
 *
 */
class EmployeeEducation
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
     *   example="S1"
     * )
     */
    public $education_code;
    /**
     * @var string
     *
     * @OA\Property(
     *   example="Strata Satu"
     * )
     */
    public $education;
}
