<?php

namespace App\Http\Virtual\Response;

use App\Http\Virtual\PagePagination;

/**
 * @OA\Schema(
 *   description="Schema of employee bank pagination. find the docs [laravel pagiantion](https://laravel.com/docs/9.x/pagination)"
 * )
 *
 */

class EmployeeBankResponse extends PagePagination
{
    /**
     * @var array
     * @OA\Property(
     *   @OA\Items(
     *     ref="#/components/schemas/EmployeeBank"
     *   )
     * )
     */
    public $data;
}
