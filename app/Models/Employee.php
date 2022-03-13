<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "user_id",
        "code_company",
        "nik",
        "fullname",
        "pin2",
        "address",
        "alternative_address",
        "gender",
        "religion",
        "phone",
        "email",
        "place_of_birth",
        "blood_type",
        "marital_status",
        "photo_character",
        "gate_of_belief",
        "employee_education_id",
        "office_id",
        "employee_division_id",
        "employee_department_id",
        "employee_position_id",
        "overtime",
        "off_duty",
        "off_duty2",
        "identity",
        "identity_number",
        "family_number",
        "join_at",
        "status",
        "status_notes",
        "resign_at",
        "resign_notes",
        "shift",
        "x_start",
        "pic",
        "npwp",
    ];

    public function families()
    {
        return $this->hasMany(Family::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

    public function insurances()
    {
        return $this->hasMany(EmployeeInsurance::class);
    }
}
