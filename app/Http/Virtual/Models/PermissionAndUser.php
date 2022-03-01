<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema represent the permission table generate by spatie"
 * )
 *
 */
class PermissionAndUser
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
     *   example="Create User"
     * )
     */
    public $name;
    /**
     * @var string
     *
     * @OA\Property(
     *   example="web"
     * )
     */
    public $guard_name;

    /**
     * @var string
     *
     * @OA\Property(
     *   example="Accounting"
     * )
     */
    public $module;


    /**
     * @var string
     *
     * @OA\Property(
     *   example="This page is awesome",
     *   description="This property can be used to meta property"
     * )
     */
    public $description;
    /**
     * The created_at property ,
     * @var string
     * @OA\Property(
     *   format="datetime",
     *   example="2015-02-23 14:40:15.000",
     *
     * )
     */
    public $created_at;
    /**
     * The updated_at property ,
     * @var string
     * @OA\Property(
     *   format="datetime",
     *   example="2015-02-23 14:40:15.000",
     *
     * )
     */
    public $updated_at;

    /**
     * @var array
     *
     * @OA\Property(
     *     type="array",
     *   description="user relationship",
     *   @OA\Items(ref="#/components/schemas/User")
     * )
     *
     */
    public $users;
}
