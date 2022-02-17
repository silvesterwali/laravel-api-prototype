<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDepartment;
use App\Http\Requests\StoreEmployeeDepartmentRequest;
use App\Http\Requests\UpdateEmployeeDepartmentRequest;

class EmployeeDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeDepartment::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeDepartmentRequest $request)
    {
        $employeeDepartment = EmployeeDepartment::create($request->all());
        return response()->json([
            "message" => "Employee Department created successfully",
            "data" => $employeeDepartment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDepartment $employeeDepartment)
    {
        return response()->json($employeeDepartment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeDepartmentRequest  $request
     * @param  \App\Models\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeDepartmentRequest $request, EmployeeDepartment $employeeDepartment)
    {
        $employeeDepartment->update($request->only($employeeDepartment->fillable));
        return response()->json([
            "message" => "Employee Department updated successfully",
            "data" => $employeeDepartment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeDepartment $employeeDepartment)
    {
        $employeeDepartment->delete();
        return response()->json([
            "message" => "Employee Department deleted successfully",
            "data" => $employeeDepartment
        ]);
    }
}
