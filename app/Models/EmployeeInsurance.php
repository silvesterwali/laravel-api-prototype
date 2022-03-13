<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInsurance extends Model
{
    use HasFactory;
    protected $fillable = [
        "employee_id",
        "insurance",
        "type",
        "number",
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
