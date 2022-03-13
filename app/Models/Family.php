<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        "relationship",
        "name",
        "date_birth",
        "faskes",
    ];
}
