<?php

use App\Events\NotifyUserHasPageSubMenu;
use App\Models\PageMenu;
use App\Models\PageSubMenu;
use App\Models\User;
use App\Models\UserHasPageSubMenu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Faker\faker;
use Illuminate\Support\Facades\Event;

uses(RefreshDatabase::class);
uses()->group('UserHasPageSubMenuEvent');

beforeEach(function () {
    $this->mockPageMenu = PageMenu::updateOrCreate([
        "title" => "dashboard",
    ], [
        "page_directory" => "/dashboard",
        "icon_class" => "fa fa-menu",
        "sorting_number" => 1,
        "description" => "Dashboard description",
        "module" => "dashboard",
    ]);


    $this->mockPageSubMenu = PageSubMenu::create([
        "page_menu_id" => $this->mockPageMenu->id,
        "title" => "Maintenance",
        "page_directory" => "/maintenance",
        "description" => "This page is awesome",
        "sorting_number" => 1
    ]);


    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);

    $this->mockUserHasPageSubMenu = [
        "user_id" => $this->user->id,
        "page_sub_menu_id" => $this->mockPageSubMenu->id
    ];
});

test('Event user has page sub menu should be called', function () {
    Event::fake();
    UserHasPageSubMenu::updateOrCreate($this->mockUserHasPageSubMenu, $this->mockUserHasPageSubMenu);
    Event::assertDispatched(NotifyUserHasPageSubMenu::class, 0);
});
