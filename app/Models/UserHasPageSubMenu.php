<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class UserHasPageSubMenu
 * 
 * @OA\Schema(
 *   description="This model was provided for user to have access to menu page in their front end",
 *   type="object"
 * )
 * 
 */
class UserHasPageSubMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'page_sub_menu_id'];
    /**
     * @OA\Property(
     *   title="user_id",
     *   description="id of user table.this will belongs to user",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $user_id;
    /**
     * @OA\Property(
     *   title="page_sub_menu_id",
     *   description="page sub menu id from page_sub_menu.",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $page_sub_menu_id;
    /**
     * @var object
     */
    public function page_sub_menu()
    {
        return $this->belongsTo(PageSubMenu::class, 'id', 'page_sub_menu_id');
    }
}
