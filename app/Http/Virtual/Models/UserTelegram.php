<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema user telegram table. belongs to user table. every user have one telegram"
 * ) 
 * 
 **/
class UserTelegram
{
    /**
     * The id property of table.
     * 
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $id;

    /**
     * The user_id property of table. represent users tables id
     * 
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $user_id;

    /**
     * The property telegrams id 
     * 
     * @var string
     * 
     * @OA\Property(
     *   example="02934293742"
     * )
     */
    public $telegrams;
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
