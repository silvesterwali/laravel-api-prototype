<?php

use App\Models\PageMenu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Faker\faker;

uses(RefreshDatabase::class);
uses()->group('page_menu');

beforeEach(function () {
    $this->mockPageMenu = [
        "title" => "dashboard",
        "page_directory" => "/dashboard",
        "icon_class" => "fa fa-menu",
        "sorting_number" => 1,
        "description" => "Dashboard description",
        "module" => "dashboard",
    ];
    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);
});

test('get: /api/v1/page-menus', function () {
    PageMenu::create($this->mockPageMenu);
    $response = $this->actingAs($this->user)->get('/api/v1/page-menus');
    $response->assertStatus(200);
    expect($response->getContent())->json()->toBeArray();
    expect($response->getContent())->json()->toHaveCount(1);
});

test('post: /api/v1/page-menus', function () {
    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->post('/api/v1/page-menus', $this->mockPageMenu);
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(['message', 'data']);
});



test('get: /api/v1/page-menus/{id}', function () {
    $lastId = PageMenu::create($this->mockPageMenu);
    $response = $this->actingAs($this->user)->get("/api/v1/page-menus/{$lastId['id']}");
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(array_keys($this->mockPageMenu));
});

test('put: /api/v1/page-menus', function () {
    $lastId = PageMenu::create($this->mockPageMenu);
    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->put("/api/v1/page-menus/{$lastId['id']}", $this->mockPageMenu);
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(['message', 'data']);
});


test('delete: /api/v1/page-menus{id}', function () {
    $lastId = PageMenu::create($this->mockPageMenu);
    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->delete("/api/v1/page-menus/{$lastId['id']}");
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(['message', 'data']);
});
