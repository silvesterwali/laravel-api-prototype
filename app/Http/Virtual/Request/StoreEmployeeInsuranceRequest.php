<?php

namespace App\Http\Virtual\Request;

/**
 * @OA\Schema(
 *      title="Store Employee insurance request",
 *      description="Store Project request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreEmployeeInsuranceRequest
{

    /**
     * @var integer
     * @OA\Property(
     *   title="employee_id",
     *   description="id of employee table",
     *   example="1",
     *   format="int64"
     * )
     */
    public $employee_id;
    /**
     * @var string
     * @OA\Property(
     *   title="insurance",
     *   description="insurance",
     *   example="BPJS Kesehatan"
     * )
     *
     */
    public $insurance;
    /**
     * @var string
     * @OA\Property(
     *   title="type",
     *   description="kesehatan",
     *   example="Kesehatan"
     * )
     *
     */
    public $type;
    /**
     * @var string
     * @OA\Property(
     *   title="number",
     *   description="number",
     *   example="023940"
     * )
     *
     */
    public $number;
}
