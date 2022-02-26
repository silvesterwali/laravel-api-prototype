<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HrmPendidikan extends Model
{
    use HasFactory;
    protected $connection = 'apps';
    protected $table = 'hrm_pendidikan';
}
