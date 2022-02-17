<?php

namespace App\Http\Controllers;

use App\Models\EmployeeReligion;
use App\Http\Requests\StoreEmployeeReligionRequest;
use App\Http\Requests\UpdateEmployeeReligionRequest;

class EmployeeReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeReligion::orderBy('religion', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeReligionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeReligionRequest $request)
    {
        $employeeReligion = EmployeeReligion::create($request->only('religion'));
        return response()->json(
            [
                "message" => "Employee Religion created successfully",
                "data" => $employeeReligion
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeReligion  $employeeReligion
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeReligion $employeeReligion)
    {
        return response()->json($employeeReligion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeReligionRequest  $request
     * @param  \App\Models\EmployeeReligion  $employeeReligion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeReligionRequest $request, EmployeeReligion $employeeReligion)
    {
        $employeeReligion->update($request->only('religion'));
        return response()->json([
            "message" => "Employee Religion updated successfully",
            "data" => $employeeReligion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeReligion  $employeeReligion
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeReligion $employeeReligion)
    {
        $employeeReligion->delete();
        return response()->json([
            "message" => "Employee Religion deleted successfully",
            "data" => $employeeReligion
        ]);
    }
}
