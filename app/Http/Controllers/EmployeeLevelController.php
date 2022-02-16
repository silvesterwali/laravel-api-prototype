<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLevel;
use App\Http\Requests\StoreEmployeeLevelRequest;
use App\Http\Requests\UpdateEmployeeLevelRequest;

class EmployeeLevelController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"EmployeeLevel"},
     *   path="/api/v1/employee-levels",
     *   security={{"sanctum ":{}}},
     *   summary="Get all employee level list. this module for human resource and new form of hrm_level module",
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *         type="array",
     *          @OA\Items(ref="#/components/schemas/EmployeeLevel")
     *      )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        return response()->json(EmployeeLevel::orderBy('level_code', 'asc')->get());
    }



    /**
     * Store a newly created resource in storage.
     * 
     *  @OA\Post(
     *   tags={"EmployeeLevel"},
     *   path="/api/v1/employee-levels",
     *   summary="Create new employee level resource",
     *   operationId="EmployeeLevel",
     *   @OA\Parameter(
     *     name="id",
     *     in="query",
     *     required=true,
     *     description="id of employee level list.this item was following the existing hrm_level structure",
     *     @OA\Schema(type="integer",example="1000")
     *   ),
     *   @OA\Parameter(
     *     name="level",
     *     in="query",
     *     required=true,
     *     description="stand for level",
     *     @OA\Schema(type="string",example="STF")
     *   ),
     *   @OA\Parameter(
     *     name="level",
     *     in="query",
     *     required=true,
     *     description="level for list of employee level",
     *     @OA\Schema(type="string",example="Staff")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="if the data need to explained how it work or something else",
     *     @OA\Schema(type="string",example="Staff")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Success give permission to user"
     *        ),
     *       @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeLevel"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param  \App\Http\Requests\StoreEmployeeLevelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeLevelRequest $request)
    {
        $employeeLevel = EmployeeLevel::create([
            "id" => $request->id,
            "level_code" => $request->level_code,
            "level" => $request->level,
            "description" => $request->description
        ]);

        return response()->json(["message" => "Success to create employee level", "data" => $employeeLevel]);
    }

    /**
     * Display the specified resource.
     *
     *
     * @OA\Get(
     *   tags={"EmployeeLevel"},
     *   path="/api/v1/employee-levels/{id}",
     *   security={{"sanctum ":{}}},
     *   summary="Get all employee level list. this module for human resource and new form of hrm_level module",
     *   @OA\Parameter(
     *      name="id",
     *      description="Employee Level id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *          )
     *      ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(ref="#/components/schemas/EmployeeLevel")
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param  \App\Models\EmployeeLevel  $employeeLevel
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLevel $employeeLevel)
    {
        return response()->json($employeeLevel);
    }



    /**
     * Update the specified resource in storage.
     * 
     *  @OA\Put(
     *   tags={"EmployeeLevel"},
     *   path="/api/v1/employee-levels/{id}",
     *   summary="Update specific existing employee level list",
     *   operationId="EmployeeLevel",
     *   @OA\Parameter(
     *      name="id",
     *      description="Employee Level id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *          )
     *      ),
     *   @OA\Parameter(
     *     name="level",
     *     in="query",
     *     required=true,
     *     description="stand for level",
     *     @OA\Schema(type="string",example="STF")
     *   ),
     *   @OA\Parameter(
     *     name="level",
     *     in="query",
     *     required=true,
     *     description="level for list of employee level",
     *     @OA\Schema(type="string",example="Staff")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="if the data need to explained how it work or something else",
     *     @OA\Schema(type="string",example="Staff")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Success give permission to user"
     *        ),
     *       @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeLevel"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param  \App\Http\Requests\UpdateEmployeeLevelRequest  $request
     * @param  \App\Models\EmployeeLevel  $employeeLevel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeLevelRequest $request, EmployeeLevel $employeeLevel)
    {
        $employeeLevel->update($request->only('level', 'level_code', 'description'));
        return response()->json([
            "message" => "Success to update employee level list",
            "data" => $employeeLevel,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *   tags={"EmployeeLevel"},
     *   path="/api/v1/employee-levels/{id}",
     *   security={{"sanctum ":{}}},
     *   summary="Delete Specific employee level list",
     *   @OA\Parameter(
     *      name="id",
     *      description="Employee Level id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *          )
     *      ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Success delete specified employee level list"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          description="Deleted item of employee level list",
     *          ref="#/components/schemas/EmployeeLevel"
     *        )
     *       )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * 
     * @param  \App\Models\EmployeeLevel  $employee_level
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLevel $employee_level)
    {
        $employee_level->delete();
        return response()->json([
            "message" => "Success delete specified employee level list",
            "data" => $employee_level
        ]);
    }
}
