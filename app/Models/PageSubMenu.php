<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PageSubMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['page_menu_id', 'title', 'page_directory', 'description', 'sorting_number',];

    public function user_has_page_sub_menus()
    {
        return $this->hasMany(UserHasPageSubMenu::class, 'page_sub_menu_id', 'id');
    }
    /**
     * @var object
     */
    public function page_menu()
    {
        return $this->belongsTo(PageMenu::class, 'page_menu_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_page_sub_menus', 'page_sub_menu_id', 'user_id');
    }
}
