<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeDivision extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sorting_number', 'division_code', 'division', 'description'];
}
