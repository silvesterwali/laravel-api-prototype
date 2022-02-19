<?php

namespace App\Http\Virtual\Models;

use OpenApi\Attributes as OA;

/**
 * @OA\Schema(
 *   description="Schema of users table. Represent authentication"
 * )
 * 
 */
class User
{
    /**
     * The id of the table 
     * @var integer
     * @OA\Property(
     *   example="1"
     * )
     * 
     * 
     */
    public $id;
    /**
     * The  username property of user
     * 
     * @var string
     * @OA\Property(
     *   example="beautifully"
     * )
     */
    public $username;
    /**
     * The email property of user,
     * 
     * @var string
     * @OA\Property(
     *   example="beautifully@pt-saa.com"
     * )
     */
    public $email;
    /**
     * The role name,
     * 
     * @var string
     * @OA\Property(
     *   example="user"
     * )
     */
    public $role;
    /**
     * The user_group property,
     * 
     * @var string
     * @OA\Property(
     *   example="EDP"
     * )
     */
    public $user_group;
    /**
     * The  is_active property, to determine if the user is active,
     * 
     * @var boolean
     * 
     * @OA\Property(
     *   example="true"
     * )
     */
    public $is_active;
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
}
