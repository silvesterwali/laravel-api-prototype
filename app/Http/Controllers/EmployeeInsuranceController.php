<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeInsuranceRequest;
use App\Http\Requests\UpdateEmployeeInsuranceRequest;
use App\Models\EmployeeInsurance;

class EmployeeInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeInsurance = EmployeeInsurance::paginate();
        return response()->json($employeeInsurance);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeInsuranceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeInsuranceRequest $request)
    {
        $employeeInsurance = EmployeeInsurance::create($request->validated());
        return response()->json(
            [
                "message" => "Employee Insurance create successfully",
                "data"    => $employeeInsurance,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeInsurance  $employeeInsurance
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeInsurance $employeeInsurance)
    {
        return response()->json($employeeInsurance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeInsuranceRequest  $request
     * @param  \App\Models\EmployeeInsurance  $employeeInsurance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeInsuranceRequest $request, EmployeeInsurance $employeeInsurance)
    {
        $employeeInsurance->update($request->validated());
        return response()->json(
            [
                "message" => "Employee insurance updated successfully",
                "data"    => $employeeInsurance,
            ]

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeInsurance  $employeeInsurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeInsurance $employeeInsurance)
    {
        $employeeInsurance->delete();
        return response()->json([
            "message" => "Employee insurance deleted successfully",
            "data"    => $employeeInsurance,
        ]);
    }
}
