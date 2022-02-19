<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema for have to access page menu"
 * )
 * 
 */
class UserHasPageSubMenu
{
    /**
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $user_id;
    /**
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $page_sub_menu_id;
}
