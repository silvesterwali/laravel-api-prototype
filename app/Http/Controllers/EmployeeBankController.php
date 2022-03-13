<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeBankRequest;
use App\Http\Requests\UpdateEmployeeBankRequest;
use App\Models\EmployeeBank;

class EmployeeBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeBank = EmployeeBank::paginate();
        return redirect()->json($employeeBank);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeBankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeBankRequest $request)
    {
        $employeeBank = EmployeeBank::create($request->validated());
        return response()->json([
            "message" => "Employee Bank created successfully",
            "data"    => $employeeBank,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBank $employeeBank)
    {
        return response()->json($employeeBank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeBankRequest  $request
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeBankRequest $request, EmployeeBank $employeeBank)
    {
        $employeeBank->update($request->validated);
        return response()->json([
            "message" => "Employee Bank updated successfully",
            "data"    => $employeeBank,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeBank $employeeBank)
    {
        $employeeBank->delete();
        return response()->json([
            "message" => "Employee Bank deleted successfully",
            "data"    => $employeeBank,
        ]);
    }
}
