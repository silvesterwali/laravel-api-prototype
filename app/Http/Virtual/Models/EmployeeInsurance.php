<?php

namespace App\Http\Virtual\Models;

use App\Http\Virtual\Timestamp;

/**
 * @OA\Schema(
 *   description="Schema of employee insurance.Used to record insurance provided to employees "
 * )
 *
 */
class EmployeeInsurance extends Timestamp
{
    /**
     * @var integer
     *
     * @OA\Property(
     *   example="1"
     * )
     *
     */
    public $id;

    /**
     * @var integer
     *
     * @OA\Property(
     *   example="1"
     * )
     */
    public $employee_id;

    /**
     * @var string
     *
     * @OA\Property(
     *   example="BPJS Kesehatan"
     * )
     */
    public $insurance;
    /**
     * @var string
     *
     * @OA\Property(
     *   example="Kesehatan"
     * )
     *
     */
    public $type;

    /**
     * @var string
     *
     * @OA\Property(
     *   description="The unique serial of insurance",
     *   example="0128303129",
     * )
     */
    public $number;
}
