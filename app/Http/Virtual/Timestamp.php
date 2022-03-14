<?php

namespace App\Http\Virtual;

/**
 * @OA\Schema(
 *   description="Schema for helper adding created_at updated_at property"
 * )
 *
 */
class Timestamp
{
    /**
     * @var string
     * @OA\Property(
     *   example="2022-03-14 11:34:00",
     *   format="datetime"
     * )
     *
     */
    public $created_at;

    /**
     * @var string
     * @OA\Property(
     *   example="2022-03-14 11:34:00",
     *   format="datetime"
     * )
     *
     */
    public $updated_at;
}
