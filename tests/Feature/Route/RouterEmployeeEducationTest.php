<?php

use App\Models\EmployeeDepartment;
use App\Models\EmployeeEducation;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use function Pest\Faker\faker;

use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);
uses()->group('EmployeeEducation');

beforeEach(function () {

    $this->user = User::create([
        "username" => faker()->username,
        "email" => faker()->email,
        "password" => Hash::make('rahasia'),
        "role" => "user",
        "user_group" => "EDP"
    ]);
    $this->employeeEducationMock = [
        "education_code" => "D1",
        "education" => "Deploma",
    ];
});

test('get: /api/v1/employee-education', function () {
    EmployeeEducation::create($this->employeeEducationMock);

    $response = $this->actingAs($this->user)->get('/api/v1/employee-education');

    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveCount(1);
});

test('post: /api/v1/employee-education', function () {
    $response = $this->actingAs($this->user)->withHeaders([
        "accept" => "application/json"
    ])->post("/api/v1/employee-education", []);
    $response->assertStatus(422);

    $response = $this->actingAs($this->user)->withHeaders([
        "accept" => "application/json"
    ])->post("/api/v1/employee-education", $this->employeeEducationMock);
    $response->assertStatus(200);
    expect($response->getContent())->json()
        ->data->toHaveKeys(array_keys($this->employeeEducationMock));
});


test("get: /api/v1/employee-education/{id}", function () {
    $EmployeeEducation = EmployeeEducation::create($this->employeeEducationMock);
    $response = $this->actingAs($this->user)->get("/api/v1/employee-education/{$EmployeeEducation->id}");
    $response->assertStatus(200);
    expect($response->getContent())->json()->toHaveKeys(array_keys($this->employeeEducationMock));
});
