<?php

namespace App\Http\Controllers;

use App\Models\EmployeePosition;
use App\Http\Requests\StoreEmployeePositionRequest;
use App\Http\Requests\UpdateEmployeePositionRequest;

class EmployeePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeePosition::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeePositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeePositionRequest $request)
    {
        $employeePosition = EmployeePosition::create($request->all());
        return response()->json([
            "message" => "Success create new employee position",
            "data" => $employeePosition
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePosition $employeePosition)
    {
        return response()->json($employeePosition);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeePositionRequest  $request
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeePositionRequest $request, EmployeePosition $employeePosition)
    {
        $employeePosition->update($request->only($employeePosition->fillable));
        return response()->json(
            [
                "message" => "Employee position updated successfully",
                "data" => $employeePosition
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePosition $employeePosition)
    {
        $employeePosition->delete();
        return response()->json([
            "message" => "Employee position deleted successfully",
            "data" => $employeePosition
        ]);
    }
}
