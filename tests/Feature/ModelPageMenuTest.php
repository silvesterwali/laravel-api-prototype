<?php

use App\Models\PageMenu;

uses()->group('ModelPageMenu');

use Illuminate\Foundation\Testing\RefreshDatabase;

beforeEach(function () {
});
uses(RefreshDatabase::class);
test('Page menu model on update or create should have id title page directory', function () {

    $pageMenu = PageMenu::updateOrCreate(
        [
            "title" => "account",
        ],
        [
            "title"          => "account",
            "page_directory" => "/account",
            "icon_class"     => "mdi-scale-balance",
            "module"         => "account",
            "sorting_number" => 1,
            "description"    => "This main page under development",
        ]
    );
    expect($pageMenu)->toHaveKeys(['id', 'title', 'page_directory']);
});
