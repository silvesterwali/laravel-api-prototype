<?php

namespace App\Http\Virtual\Models;

/**
 * @OA\Schema(
 *   description="Provide menu management from front end needed. and inspire by vuetify menu drawer. this table will be the first route directory"
 * )
 * 
 */
class PageMenu
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
    public $icon_class;
    /**
     * @var string
     * 
     * @OA\Property(
     *   example="Accounting"
     * )
     */
    public $module;
    /**
     * @var string
     * 
     * @OA\Property(
     *   example="1",
     *   description="some how user want the menu to top or bottom this will help"
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
}
