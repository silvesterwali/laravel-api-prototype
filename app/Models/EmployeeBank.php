<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBank extends Model
{
    use HasFactory;

    protected $fillable = [
        "employee_id",
        "bank",
        "number",
        "type",
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
