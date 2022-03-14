<?php
namespace App\Http\Virtual\Response;

use App\Http\Virtual\PagePagination;

/**
 * @OA\Schema(
 *   description="Schema of employee insurance pagination. find the docs [laravel pagiantion](https://laravel.com/docs/9.x/pagination)"
 * )
 *
 */
class EmployeeInsuranceResponse extends PagePagination
{
    /**
     * @var array
     * @OA\Property(
     *   @OA\Items(
     *     ref="#/components/schemas/EmployeeInsurance"
     *   )
     * )
     */
    public $data;
}
