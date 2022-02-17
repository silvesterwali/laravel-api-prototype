<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeReligion
 * 
 * @OA\Schema(
 *   description="The module is used to store level one of page directory after the domain is of front end. and will follow by page sub menu directory as child page. this will support dynamic access page for user",
 *   type="object"
 * )
 * 
 */
class EmployeeReligion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['religion'];
    /**
     * @OA\Property(
     *   title="id",
     *   description="id of table",
     *   type="integer",
     *   example="1"
     * )
     *
     * @var integer
     */
    public $id;
    /**
     * @OA\Property(
     *   title="religion",
     *   description="the field name show the value of meaningful",
     *   type="string",
     *   example="HINDU"
     * )
     *
     * @var string
     */
    public $religion;
}
