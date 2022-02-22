<?php

use App\Models\PageMenu;
use App\Models\PageSubMenu;
use App\Models\User;
use App\Models\UserHasPageSubMenu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Faker\faker;


uses(RefreshDatabase::class);
uses()->group('UserHasPageSubMenu');

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

test('post: /api/v1/user-has-page-sub-menus', function () {
    $response = $this->actingAs($this->user)
        ->withHeaders(["accept" => "application/json"])
        ->post('/api/v1/user-has-page-sub-menus', []);
    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', 'errors']);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->post('/api/v1/user-has-page-sub-menus', $this->mockUserHasPageSubMenu);
    $response->assertStatus(200);
    expect($response->getContent())
        ->json()->data->toHaveKeys(array_keys($this->mockUserHasPageSubMenu));
});


test('delete: /api/v1/user-has-page-sub-menus/{id}', function () {
    $userHasPageSubMenu = UserHasPageSubMenu::create($this->mockUserHasPageSubMenu);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->delete("/api/v1/user-has-page-sub-menus/{$userHasPageSubMenu->id}");
    $response->assertStatus(200);
    expect($response->getContent())
        ->json()->data->toHaveKeys(array_keys($this->mockUserHasPageSubMenu));
});
