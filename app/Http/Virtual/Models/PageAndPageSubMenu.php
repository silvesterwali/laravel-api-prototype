<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Schema for child every child menu"
 * )
 * 
 */
class PageAndPageSubMenu
{
    /**
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $id;
    /**
     * @var integer
     * 
     * @OA\Property(
     *   example="1"
     * )
     */
    public $page_menu_id;
    /**
     * @var string
     * 
     * @OA\Property(
     *   example="Accounting"
     * )
     */
    public $title;
    /**
     * @var string
     * 
     * @OA\Property(
     *   example="/accounting"
     * )
     */
    public $page_directory;
    /**
     * @var string
     * 
     * @OA\Property(
     *   example="mdi-apps"
     * )
     */


    public $sorting_number;

    /**
     * @var string
     * 
     * @OA\Property(
     *   example="This page is awesome",
     *   description="This property can be used to meta property"
     * )
     */
    public $description;

    /**
     * @var array
     * 
     * @OA\Property(
     *     type="array",
     *     @OA\Items(
     *   description="page sub menus relationship",
     *   ref="#/components/schemas/PageSubMenu"
     * )
     * )
     * 
     */
    public $page_sub_menus;
}
