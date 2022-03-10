<?php

namespace App\Http\Controllers;

use App\Models\EmployeeBank;
use App\Http\Requests\StoreEmployeeBankRequest;
use App\Http\Requests\UpdateEmployeeBankRequest;

class EmployeeBankController extends Controller
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
     * @param  \App\Http\Requests\StoreEmployeeBankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeBankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBank $employeeBank)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeBank $employeeBank)
    {
        //
    }
}
