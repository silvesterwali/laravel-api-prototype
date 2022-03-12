<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserHasPageSubMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'page_sub_menu_id'];

    public function page_sub_menu()
    {
        return $this->belongsTo(PageSubMenu::class,  'page_sub_menu_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
