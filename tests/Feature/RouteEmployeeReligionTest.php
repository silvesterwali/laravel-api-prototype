<?php

use App\Models\EmployeeReligion;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use function Pest\Faker\faker;

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);
uses()->group('EmployeeReligion');
beforeEach(function () {
    $this->EmployeeReligionMock = ["religion" => "Hindu"];

    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);
});

test('get: /api/v1/employee-religions', function () {
    // prepare data

    EmployeeReligion::create($this->EmployeeReligionMock);
    $response = $this->actingAs($this->user)->get('/api/v1/employee-religions');

    // assert
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveCount(1);
});


test('post: /api/vi/employee-religions', function () {
    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->post('/api/v1/employee-religions', []);
    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', 'errors']);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->post("/api/v1/employee-religions", $this->EmployeeReligionMock);
    $response->assertStatus(200);

    expect($response->getContent())->json()->toHaveKeys(['message', 'data']);
});


test('get : /api/v1/employee-religions/{id}', function () {
    // prepare data
    $employeeReligion = EmployeeReligion::create($this->EmployeeReligionMock);

    $response = $this->actingAs($this->user)->get("/api/v1/employee-religions/{$employeeReligion->id}");

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()->toHaveKeys(array_keys($this->EmployeeReligionMock));
});


test("put : /api/v1/employee-religions/{id}", function () {
    $employeeReligion = EmployeeReligion::create($this->EmployeeReligionMock);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->put("/api/v1/employee-religions/{$employeeReligion->id}", []);

    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->put("/api/v1/employee-religions/{$employeeReligion->id}", $this->EmployeeReligionMock);
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(['message', 'data']);
});


test("delete : /api/v1/employee-religions/{id}", function () {
    $employeeReligion = EmployeeReligion::create($this->EmployeeReligionMock);

    $response = $this->actingAs($this->user)
        ->withHeaders(['accept' => 'application/json'])
        ->delete("/api/v1/employee-religions/{$employeeReligion->id}");
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(['message', 'data']);
});
