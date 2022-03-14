<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeBankRequest;
use App\Http\Requests\UpdateEmployeeBankRequest;
use App\Models\EmployeeBank;

class EmployeeBankController extends Controller
{
    /**
     *
     * @OA\Get(
     *   tags={"EmployeeBank"},
     *   path="/api/v1/employee-banks?page=1",
     *   summary="Display a listing of the resource employee bank",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        ref="#/components/schemas/EmployeeBankResponse",
     *      )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeBank = EmployeeBank::paginate();
        return redirect()->json($employeeBank);
    }

    /**
     *
     * @OA\Post(
     *   tags={"EmployeeBank"},
     *   path="/api/v1/employee-bank",
     *   summary="Store a newly created resource in employee bank storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="employee_id",
     *      in="query",
     *      required=true,
     *      description="Employee id table",
     *      @OA\Schema(
     *          type="integer",
     *          example="1"
     *        )
     *   ),
     *   @OA\Parameter(
     *      name="bank",
     *      in="query",
     *      required=true,
     *      description="Bank name",
     *      @OA\Schema(
     *         type="string",
     *         example="Bank Mandiri"
     *       )
     *   ),
     *   @OA\Parameter(
     *      name="Number",
     *      in="query",
     *      required=true,
     *      description="Serial number of bank",
     *      @OA\Schema(
     *         type="string",
     *         example="01284999"
     *       )
     *   ),
     *   @OA\Parameter(
     *      name="type",
     *      in="query",
     *      required=true,
     *      description="Uses of bank",
     *      @OA\Schema(
     *         type="string",
     *         example="Tabungan"
     *       )
     *   ),
     *   @OA\Response(
     *       response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(property="message", type="string",example="Employee Bank created successfully"),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeBank"
     *        )
     *      )
     *      ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
     * @OA\Get(
     *   tags={"EmployeeBank"},
     *   path="/api/v1/employee-banks/{employee_bank}",
     *   summary="Display the specified employee bank resource.",
     *   @OA\Parameter(
     *     name="employee_bank",
     *     in="path",
     *     required=true,
     *     description="The id of employee bank resource",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       ref="#/components/schemas/EmployeeBank"
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
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
     *
     * @OA\Put(
     *   tags={"EmployeeBank"},
     *   path="/api/v1/employee-banks/{employee_bank}",
     *   summary="Update the specified employee bank  resource in storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="employee_bank",
     *     in="path",
     *     required=true,
     *     description="The id of employee bank resource",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Parameter(
     *      name="employee_id",
     *      in="query",
     *      required=true,
     *      description="Employee id table",
     *      @OA\Schema(
     *          type="integer",
     *          example="1"
     *        )
     *   ),
     *   @OA\Parameter(
     *      name="bank",
     *      in="query",
     *      required=true,
     *      description="Bank name",
     *      @OA\Schema(
     *         type="string",
     *         example="Bank Mandiri"
     *       )
     *   ),
     *   @OA\Parameter(
     *      name="Number",
     *      in="query",
     *      required=true,
     *      description="Serial number of bank",
     *      @OA\Schema(
     *         type="string",
     *         example="01284999"
     *       )
     *   ),
     *   @OA\Parameter(
     *      name="type",
     *      in="query",
     *      required=true,
     *      description="Uses of bank",
     *      @OA\Schema(
     *         type="string",
     *         example="Tabungan"
     *       )
     *   ),
     *   @OA\Response(
     *       response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(property="message", type="string",example="Employee Bank updated successfully"),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeBank"
     *        )
     *       )
     *      ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
     * Remove the specified resource from employee bank storage.
     *
     *
     * @OA\Delete(
     *   tags={"EmployeeBank"},
     *   path="/api/v1/employee-banks/{employee_bank}",
     *   summary="Remove the specified resource from employee bank storage.",
     *   @OA\Parameter(
     *     name="employee_bank",
     *     in="path",
     *     required=true,
     *     description="The id of employee bank resource",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Employee Bank deleted successfully"
     *       ),
     *       @OA\Property(
     *         type="object",
     *         property="data",
     *         ref="#/components/schemas/EmployeeBank"
     *        )
     *      )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
