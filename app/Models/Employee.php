<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

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
