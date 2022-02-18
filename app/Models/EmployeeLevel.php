<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeLevel extends Model
{
    use HasFactory;

    protected $fillable = ['sorting_number', 'level_code', 'level', 'description'];

    public $timestamps = false;
}
