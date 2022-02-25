<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class PageMenu extends Model
{
    use HasFactory, Searchable;
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
    #[SearchUsingPrefix(['username', 'email'])]
    function toSearchableArray()
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
        ];
    }
}
