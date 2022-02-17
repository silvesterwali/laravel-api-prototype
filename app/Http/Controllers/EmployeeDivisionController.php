<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDivision;
use App\Http\Requests\StoreEmployeeDivisionRequest;
use App\Http\Requests\UpdateEmployeeDivisionRequest;

class EmployeeDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeDivision::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeDivisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeDivisionRequest $request)
    {
        $employeeDivision = EmployeeDivision::create($request->all());
        return response()->json([
            "message" => "Employee Division created successfully",
            "data" => $employeeDivision
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeDivision  $employeeDivision
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDivision $employeeDivision)
    {
        return response()->json($employeeDivision);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeDivisionRequest  $request
     * @param  \App\Models\EmployeeDivision  $employeeDivision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeDivisionRequest $request, EmployeeDivision $employeeDivision)
    {
        $employeeDivision->update($request->only($employeeDivision->fillable));
        return response()->json([
            "message" => "Employee Division updated successfully",
            "data" => $employeeDivision
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDivision  $employeeDivision
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeDivision $employeeDivision)
    {
        $employeeDivision->delete();
        return response()->json([
            "message" => "Employee Division delete successfully",
            "data" => $employeeDivision
        ]);
    }
}
