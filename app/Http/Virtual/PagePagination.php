<?php

namespace App\Http\Virtual;

/**
 * @OA\Schema(
 *   description="Schema of basic pagination. find the docs [laravel pagiantion](https://laravel.com/docs/9.x/pagination)"
 * )
 *
 */
class PagePagination
{
    /**
     * @var integer
     * @OA\Property(
     *   example="50"
     * )
     *
     */
    public $total;
    /**
     * @var integer
     * @OA\Property(
     *   example="15"
     * )
     */
    public $per_page;
    /**
     * @var integer
     * @OA\Property(
     *   example="1"
     * )
     *
     */
    public $current_page;
    /**
     * @var integer
     * @OA\Property(
     *   example="4"
     * )
     *
     */
    public $last_page;
    /**
     * @var string
     *  @OA\Property(
     *    example="http://saka.app?page=1"
     *  )
     */
    public $first_page_url;
    /**
     * @var string
     * @OA\Property(
     *   example="http://saka.app?page=4"
     * )
     */
    public $last_page_url;
    /**
     * @var string
     * @OA\Property(
     *   example="http://saka.app?page=2"
     * )
     *
     */
    public $next_page_url;
    /**
     * @var string
     * @OA\Property(
     *   example="null"
     * )
     */
    public $prev_page_url;
    /**
     * @var string
     * @OA\Property(
     *   example="http://saka.app"
     * )
     *
     */
    public $path;
    /**
     * @var integer
     * @OA\Property(
     *   example="1"
     * )
     */
    public $from;
    /**
     * @var integer
     * @OA\Property(
     *   example="15"
     * )
     */
    public $to;
}
