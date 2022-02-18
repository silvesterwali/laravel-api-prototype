<?php

namespace Database\Seeders;

use App\Models\PageMenu;
use App\Models\PageSubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayPageMenu = [
            [
                "title" => "Accounting",
                "page_directory" => "/accounting",
                "icon_class" => "mdi-scale-balance",
                "module" => "Accounting",
                "sorting_number" => 1,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1
                    ]
                ]

            ],
            [
                "title" => "Human Resource",
                "page_directory" => "/human-resource",
                "icon_class" => "mdi-account-group-outline",
                "module" => "Human Resource",
                "sorting_number" => 2,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "General Affairs",
                "page_directory" => "/general-affairs",
                "icon_class" => "mdi-binoculars",
                "module" => "General Affairs",
                "sorting_number" => 3,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]

            ],
            [
                "title" => "Sales",
                "page_directory" => "/sales",
                "icon_class" => "mdi-chart-line",
                "module" => "Sales",
                "sorting_number" => 4,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "Fee Sales",
                "page_directory" => "/fee-sales",
                "icon_class" => "mdi-cart-plus",
                "module" => "Fee Sales",
                "sorting_number" => 5,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "MSTR",
                "page_directory" => "/mstr",
                "icon_class" => "mdi-apps",
                "module" => "MSTR",
                "sorting_number" => 6,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "Finance",
                "page_directory" => "/finance",
                "icon_class" => "mdi-apps",
                "module" => "Finance",
                "sorting_number" => 7,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "Ongkos Angkut",
                "page_directory" => "/ongkos-anggkut",
                "icon_class" => "mdi-apps",
                "module" => "Logistik",
                "sorting_number" => 8,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "Purchase",
                "page_directory" => "/purchase",
                "icon_class" => "mdi-apps",
                "module" => "Purchase",
                "sorting_number" => 9,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "Inventory",
                "page_directory" => "/inventory",
                "icon_class" => "mdi-apps",
                "module" => "Logistik",
                "sorting_number" => 10,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],
            [
                "title" => "labor",
                "page_directory" => "/labor",
                "icon_class" => "mdi-apps",
                "module" => "Logistik",
                "sorting_number" => 11,
                "description" => "This main page under development",
                "page_sub_menus" => [
                    [
                        "title" => "Maintenance",
                        "page_directory" => "/maintenance",
                        "description" => "This page under maintenance",
                        "sorting_number" => 1,
                    ]
                ]
            ],

        ];

        foreach ($arrayPageMenu as $page) {
            $pageMenu = PageMenu::updateOrCreate(
                [
                    "title" => $page['title'],
                    "page_directory" => $page['page_directory'],
                    "icon_class" => $page['icon_class'],
                    "module" => $page['module'],
                    "sorting_number" => $page['sorting_number'],
                    "description" => $page['description'],

                ]
            );


            foreach ($page['page_sub_menus'] as $page_menu) {
                PageSubMenu::firstOrCreate([
                    "page_menu_id" => $pageMenu->id,
                    "title" => $page_menu['title'],
                ], [
                    "page_directory" => $page_menu['page_directory'],
                    "description" => $page_menu['description'],
                    "sorting_number" => $page_menu['sorting_number'],
                ]);
            }
        }
    }
}
