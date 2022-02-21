<?php

use App\Models\PageMenu;
use App\Models\PageSubMenu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Faker\faker;


uses(RefreshDatabase::class);
uses()->group('PageSubMenu');

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


    $this->mockPageSubMenu = [
        "page_menu_id" => $this->mockPageMenu->id,
        "title" => "Maintenance",
        "page_directory" => "/maintenance",
        "description" => "This page is awesome",
        "sorting_number" => 1
    ];


    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);
});

test('get: /api/v1/page-sub-menus', function () {
    PageSubMenu::create($this->mockPageSubMenu);
    $response = $this->actingAs($this->user)->get('/api/v1/page-sub-menus');
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveCount(1);
});


test('post: /api/v1/page-sub-menus', function () {
    $response = $this->actingAs($this->user)
        ->withHeaders(["accept" => "application/json"])
        ->post('/api/v1/page-sub-menus', []);
    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->post("/api/v1/page-sub-menus", $this->mockPageSubMenu);

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->mockPageSubMenu);
});



test('get: /api/v1/page-sub-menus/{id}', function () {
    $pageSubMenu = PageSubMenu::create($this->mockPageSubMenu);
    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->get("/api/v1/page-sub-menus/{$pageSubMenu->id}");
    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->toHaveKeys(array_keys($this->mockPageSubMenu));
});




test('put: /api/v1/page-sub-menus/{id}', function () {
    $pageSubMenu = PageSubMenu::create($this->mockPageSubMenu);
    $response = $this->actingAs($this->user)
        ->withHeaders(["accept" => "application/json"])
        ->put("/api/v1/page-sub-menus/{$pageSubMenu->id}", []);
    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->put("/api/v1/page-sub-menus/{$pageSubMenu->id}", $this->mockPageSubMenu);

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->mockPageSubMenu);
});


test('delete: /api/v1/page-sub-menus/{id}', function () {
    $pageSubMenu = PageSubMenu::create($this->mockPageSubMenu);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->delete("/api/v1/page-sub-menus/{$pageSubMenu->id}");

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->mockPageSubMenu);
});
