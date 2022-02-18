<?php

use App\Models\EmployeeDepartment;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use function Pest\Faker\faker;

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);
uses()->group('EmployeeDepartment');

beforeEach(function () {

    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);
    $this->employeeDepartmentMock = [
        "sorting_number" => 1,
        "department_code" => "EDP",
        "department" => "Electronic Department",
        "description" => "Beautifully Sunday",
    ];
});



test('index: /api/v1/employee-departments', function () {
    EmployeeDepartment::create($this->employeeDepartmentMock);
    $response = $this->actingAs($this->user)->get('/api/v1/employee-departments');
    $response->assertStatus(200);
    $dataResponse = $response->getContent();

    expect($dataResponse)
        ->json()
        ->toHaveCount(1);

    expect(json_decode($response->getContent(), true)[0])
        ->toMatchArray($this->employeeDepartmentMock);
});


test("post: /api/v1/employee-departments", function () {
    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->post('/api/v1/employee-departments', []);

    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->post('/api/v1/employee-departments', $this->employeeDepartmentMock);

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->employeeDepartmentMock);
});


test("get: /api/v1/employee-departments/{id}", function () {
    $lastDepartment = EmployeeDepartment::create($this->employeeDepartmentMock);
    $response = $this->actingAs($this->user)->get("/api/v1/employee-departments/{$lastDepartment['id']}");
    $response->assertStatus(200);
    expect(json_decode($response->getContent()))
        ->toMatchArray($this->employeeDepartmentMock);
});



test("put: /api/v1/employee-departments/{id}", function () {
    $lastDepartment = EmployeeDepartment::create($this->employeeDepartmentMock);
    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->put("/api/v1/employee-departments/{$lastDepartment['id']}", []);

    $response->assertStatus(422);
    expect($response->getContent())->json()->toHaveKeys(['message', "errors"]);

    $response = $this->withHeaders(
        ['accept' => 'application/json']
    )
        ->actingAs($this->user)
        ->put("/api/v1/employee-departments/{$lastDepartment['id']}", $this->employeeDepartmentMock);

    $response->assertStatus(200);
    expect($response->getContent())
        ->json()
        ->data
        ->toMatchArray($this->employeeDepartmentMock);
});


test("delete: /api/v1/employee-departments/{id}", function () {
    $lastDepartment = EmployeeDepartment::create($this->employeeDepartmentMock);
    $response = $this->actingAs($this->user)->delete("/api/v1/employee-departments/{$lastDepartment['id']}");
    $response->assertStatus(200);
    expect(json_decode($response->getContent()))
        ->data->toMatchArray($this->employeeDepartmentMock);
});
