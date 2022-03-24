<?php
use App\Http\Requests\StoreFamilyRequest;
uses()->group('StoreFamilyRequest');
test('test store family request should have valid rules', function () {
    $r = new StoreFamilyRequest();
    expect((object) [
        'employee_id'  => "required|integer|exists:employees,id",
        "relationship" => "required|string",
        "name"         => "required|string",
        "date_birth"   => "date_format:Y-m-d",
        "faskes"       => "string",
    ])->toMatchObject($r->rules());
});
