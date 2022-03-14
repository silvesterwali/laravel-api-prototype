<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema of employee bank account table."
 * )
 *
 */
class EmployeeBank
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
     * @var integer
     *
     * @OA\Property(
     *   example="1"
     * )
     *
     */
    public $employee_id;

    /**
     * @var string
     *
     * @OA\Property(
     *   example="Bank Mandiri"
     * )
     *
     */
    public $bank;

    /**
     * @var string
     * @OA\Property(
     *   example="0234237793"
     * )
     *
     */
    public $number;

    /**
     * @var string
     * @OA\Property(
     *   example="Tabungan"
     * )
     *
     */
    public $type;

}
