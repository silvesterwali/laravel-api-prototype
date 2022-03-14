<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeInsuranceRequest;
use App\Http\Requests\UpdateEmployeeInsuranceRequest;
use App\Models\EmployeeInsurance;

class EmployeeInsuranceController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"EmployeeInsurance"},
     *   path="/api/vi/employee-insurances",
     *   summary=" Display a listing of the employee insurances resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       ref="#/components/schemas/EmployeeInsuranceResponse"
     *     )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
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
     * @OA\Post(
     *   tags={"EmployeeInsurance"},
     *   path="/api/v1/employee-insurances",
     *   summary="Store a newly created resource in employee insurance storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       ref="#/components/schemas/StoreEmployeeInsuranceRequest"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Employee Insurance create successfully"
     *       ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/EmployeeInsurance"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
     * @OA\Get(
     *   tags={"EmployeeInsurance"},
     *   path="/api/v1/employee-insurances/{employee_insurance}",
     *   summary="Display the specified employee insurance resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *          name="employee_insurance",
     *          description="employee insurance id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       ref="#/components/schemas/EmployeeInsurance"
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
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
     * @OA\Put(
     *   tags={"EmployeeInsurance"},
     *   path="/api/v1/employee-insurances/{employee_insurance}",
     *   summary="Update the specified resource in employee insurance storage",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *          name="employee_insurance",
     *          description="employee insurance id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       ref="#/components/schemas/StoreEmployeeInsuranceRequest"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Employee insurance updated successfully"
     *       ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/EmployeeInsurance"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
     * @OA\Delete(
     *   tags={"EmployeeInsurance"},
     *   path="/api/v1/employee-insurances/{employee_insurance}",
     *   summary="Remove the specified resource in employee insurance storage",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *          name="employee_insurance",
     *          description="employee insurance id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Employee insurance deleted successfully"
     *       ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/EmployeeInsurance"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
