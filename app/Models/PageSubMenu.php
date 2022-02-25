<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class PageSubMenu extends Model
{
    use HasFactory, Searchable;
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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    #[SearchUsingPrefix(['title', 'description'])]
    function toSearchableArray()
    {
        $array = $this->with('users', 'page_menu')->toArray();


        return $array;
    }
}
