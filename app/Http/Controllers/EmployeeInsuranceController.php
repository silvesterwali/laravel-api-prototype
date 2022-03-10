<?php

namespace App\Http\Controllers;

use App\Models\EmployeeInsurance;
use App\Http\Requests\StoreEmployeeInsuranceRequest;
use App\Http\Requests\UpdateEmployeeInsuranceRequest;

class EmployeeInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeInsuranceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeInsuranceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeInsurance  $employeeInsurance
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeInsurance $employeeInsurance)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeInsurance  $employeeInsurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeInsurance $employeeInsurance)
    {
        //
    }
}
