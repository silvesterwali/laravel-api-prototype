<?php

use App\Models\PageMenu;

uses()->group('ModelPageMenu');

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);



test('updateOrCreate', function () {

    $pageMenu = PageMenu::updateOrCreate(
        [
            "title" => "account",
        ],
        [
            "title" => "account",
            "page_directory" => "/account",
            "icon_class" => "mdi-scale-balance",
            "module" => "account",
            "sorting_number" => 1,
            "description" => "This main page under development",
        ]
    );

    expect($pageMenu['id'])->toBe(1);
    expect($pageMenu->id)->toBeNull();
});
