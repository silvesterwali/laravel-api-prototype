<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTelegram extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_telegrams';
    protected $dates = ['deleted_at'];
}
