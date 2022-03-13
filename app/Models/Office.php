<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'office_code',
        "office",
        "description",
        "overtime_time_pay",
        "different_time",
        "telephone",
        "coce_code",
        "on_duty_monday",
        "off_duty_monday",
        "on_duty_tuesday",
        "off_duty_tuesday",
        "of_duty_wednesday",
        "of_duty_wednesday",
        "on_duty_thursday",
        "off_duty_thursday",
        "on_duty_friday",
        "off_duty_friday",
        "on_duty_saturday",
        "off_duty_saturday",
        "on_duty_sunday",
        "off_duty_sunday",
        "on_shift_1",
        "off_shift_1",
        "on_shift_2",
        "off_shift_2",
        "on_shift_3",
        "off_shift_3",
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
