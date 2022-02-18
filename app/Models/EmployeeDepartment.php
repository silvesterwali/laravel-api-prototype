<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeDepartment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sorting_number', 'department_code', 'department', 'description'];
}
