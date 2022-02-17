<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PageMenu
 * 
 * @OA\Schema(
 *   description="The module is used to store level one of page directory after the domain is of front end. and will follow by page sub menu directory as child page. this will support dynamic access page for user",
 *   type="object"
 * )
 * 
 */
class PageMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'page_directory', 'icon_class', 'description', 'sorting_number', 'module'];
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
     *   title="title",
     *   description="title for the menu to user label if button or label on order list",
     *   type="string",
     *   example="Inventory"
     * )
     *
     * @var integer
     */
    public $title;
    /**
     * @OA\Property(
     *   title="page_directory",
     *   description="The first level of the page directory after the domain of front end",
     *   type="string",
     *   example="/inventory/"
     * )
     *
     * @var string
     */
    public $page_directory;
    /**
     * @OA\Property(
     *   title="icon_class",
     *   description="user menu maybe used icon like font awesome or mdi form google icon",
     *   type="string",
     *   example="mdi-apps"
     * )
     *
     * @var string
     */
    public $icon_class;
    /**
     * @OA\Property(
     *   title="module",
     *   description="will grouping by general division like accounting,inventory,general affair and so on",
     *   type="string",
     *   example="inventory"
     * )
     *
     * @var string
     */
    public $module;
    /**
     * @OA\Property(
     *   title="sorting_number",
     *   description="sometime we don't want plan the system at all. so we want to move the menu to top or bottom so why this field was",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var string
     */
    public $sorting_number;
    /**
     * @OA\Property(
     *   title="description",
     *   description="the page description and also can be used  as meta description at front end",
     *   type="string",
     *   example="this page is awesome,goog looking with artisan series"
     * )
     *
     * @var integer
     */
    public $description;
}
