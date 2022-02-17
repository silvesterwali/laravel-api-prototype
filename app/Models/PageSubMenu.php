<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class PageSubMenu
 * 
 * @OA\Schema(
 *   description="PageSubMenu is model for to storage all child menu for front end menu navigation needed",
 *   type="object"
 * )
 * 
 */
class PageSubMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['page_menu_id', 'title', 'page_directory', 'description', 'sorting_number',];
    /**
     * @OA\Property(
     *   title="id",
     *   description="id of table",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $id;
    /**
     * @OA\Property(
     *   title="id",
     *   description="id of page_menus table",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $page_menu_id;
    /**
     * @OA\Property(
     *   title="title",
     *   description="title of page sub menu",
     *   type="string",
     *   example="Maintenance"
     * )
     *
     * @var integer
     */
    public $title;
    /**
     * @OA\Property(
     *   title="page_directory",
     *   description="the fist page sub directory from parent directory on front end page",
     *   type="string",
     *   example="/maintenance"
     * )
     *
     * @var string
     */
    public $page_directory;
    /**
     * @OA\Property(
     *   title="description",
     *   description="The description of the page sub menu. this will for seo also",
     *   type="string",
     *   example="this page is awesome"
     * )
     *
     * @var string
     */
    public $description;
    /**
     * @OA\Property(
     *   title="sorting_number",
     *   description="sometime user need to sort their menu from top to bottom as they like. this will help to effort it",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var string
     */
    public $sorting_number;

    /**
     * @var array
     */
    public function user_has_page_sub_menus()
    {
        return $this->hasMany(UserHasPageSubMenu::class, 'page_sub_menu_id', 'id');
    }
    /**
     * @var object
     */
    public function page_menu()
    {
        return $this->belongsTo(PageMenu::class, 'id', 'page_menu_id');
    }
}
