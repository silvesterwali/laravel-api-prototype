<?php

namespace App\Http\Controllers;

use App\Models\EmployeeReligion;
use App\Http\Requests\StoreEmployeeReligionRequest;
use App\Http\Requests\UpdateEmployeeReligionRequest;

class EmployeeReligionController extends Controller
{

    /**
     * @OA\Get(
     *   tags={"EmployeeReligion"},
     *   path="/api/v1/employee-religions",
     *   summary="Display a listing of the employee religions resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *      response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/EmployeeReligion")
     *      )
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeReligion::orderBy('religion', 'asc')->get());
    }

    /**
     * @OA\Post(
     *   tags={"EmployeeReligion"},
     *   path="/api/v1/employee-religions",
     *   summary="Store a newly created resource in employee religions storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="religion",
     *     in="query",
     *     required=true,
     *     description="religion property",
     *     @OA\Schema(type="string",example="Hindu")
     *   ),
     *   @OA\Response(response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *           type="string",
     *           example="Employee Religion created successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeReligion"
     *        )
     *      )  
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
     * @OA\Get(
     *   tags={"EmployeeReligion"},
     *   path="/api/v1/employees-religions/{id}",
     *   summary="Display the specified employee religion resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee religion table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(
     *      response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        ref="#/components/schemas/EmployeeReligion"
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * 
     *
     * @param  \App\Models\EmployeeReligion  $employeeReligion
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeReligion $employeeReligion)
    {
        return response()->json($employeeReligion);
    }

    /**
     * @OA\Put(
     *   tags={"EmployeeReligion"},
     *   path="/api/v1/employee-religions/{id}",
     *   summary="Update the specified resource in employee religion storage.",
     *   security={{"sanctum ":{}}},
     *  @OA\Parameter(
     *      name="id",
     *      description="id the employee religion table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="religion",
     *     in="query",
     *     required=true,
     *     description="religion property",
     *     @OA\Schema(type="string",example="Hindu")
     *   ),
     *   @OA\Response(response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *           type="string",
     *           example="Employee Religion updated successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeReligion"
     *        )
     *      )  
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * 
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
     * @OA\Delete(
     *   tags={"EmployeeReligion"},
     *   path="/api/v1/employee-religions/{id}",
     *   summary=" Remove the specified resource from employee religion storage",
     *   security={{"sanctum ":{}}},
     *  @OA\Parameter(
     *      name="id",
     *      description="id the employee religion table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *           type="string",
     *           example="Employee Religion deleted successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeReligion"
     *        )
     *      )  
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * 
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
