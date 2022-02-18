<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PageMenu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = ['title', 'page_directory', 'icon_class', 'description', 'sorting_number', 'module'];
    /**
     * @var array
     */
    public function page_sub_menus()
    {
        return $this->hasMany(PageSubMenu::class, 'page_menu_id', 'id');
    }
}
