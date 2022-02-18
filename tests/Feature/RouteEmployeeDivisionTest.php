<?php

use App\Models\EmployeeDivision;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use function Pest\Faker\faker;

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);
uses()->group('EmployeeDivision');


beforeEach(function () {

    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);
    $this->employeeDivisionMock = [
        "sorting_number" => 1,
        "division_code" => "ITD",
        "division" => "IT Development",
        "description" => "Beautifully Sunday",
    ];
});



test('get: /api/v1/employee-divisions', function () {
    EmployeeDivision::create($this->employeeDivisionMock);
    $response = $this->actingAs($this->user)->get('/api/v1/employee-divisions');
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveCount(1);
});


test("post: /api/v1/employee-divisions", function () {
    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->post('/api/v1/employee-divisions', []);

    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->post('/api/v1/employee-divisions', $this->employeeDivisionMock);

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->employeeDivisionMock);
});


test('get: /api/v1/employee-divisions/{id}', function () {
    $lastDivision = EmployeeDivision::create($this->employeeDivisionMock);
    $response = $this->actingAs($this->user)->get("/api/v1/employee-divisions/{$lastDivision['id']}");
    $response->assertStatus(200);
    expect($response->getContent())->json()->toMatchArray($this->employeeDivisionMock);
});


test("put: /api/v1/employee-divisions/{id}", function () {
    $lastDivision = EmployeeDivision::create($this->employeeDivisionMock);
    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->put("/api/v1/employee-divisions/{$lastDivision['id']}", []);

    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->put("/api/v1/employee-divisions/{$lastDivision['id']}", $this->employeeDivisionMock);

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->employeeDivisionMock);
});


test("delete: /api/v1/employee-divisions/{id}", function () {
    $lastDivision = EmployeeDivision::create($this->employeeDivisionMock);
    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->delete("/api/v1/employee-divisions/{$lastDivision['id']}");

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->employeeDivisionMock);
});
