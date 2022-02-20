<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDepartment;
use App\Http\Requests\StoreEmployeeDepartmentRequest;
use App\Http\Requests\UpdateEmployeeDepartmentRequest;

class EmployeeDepartmentController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"EmployeeDepartment"},
     *   path="/api/v1/employee-departments",
     *   summary="Fetch all employee department.",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/EmployeeDepartment")
     *      )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeDepartment::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * @OA\Post(
     *   tags={"EmployeeDepartment"},
     *   path="/api/v1/employee-departments",
     *   security={{"sanctum ":{}}},
     *   summary="Store a newly created resource in employee department storage ",
     *   @OA\Parameter(
     *     name="department_code",
     *     in="query",
     *     required=true,
     *     description="department code property",
     *     @OA\Schema(type="string",example="ITD")
     *   ),
     *   @OA\Parameter(
     *     name="department",
     *     in="query",
     *     required=true,
     *     description="department property",
     *     @OA\Schema(type="string",example="Information Technology Department")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="The description of department",
     *     @OA\Schema(type="string",example="Information the department is awesome")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="The property for sorting data",
     *     @OA\Schema(type="integer",example="1000")
     *   ),
     *   @OA\Response(
     *       response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(property="message", type="string",example="Employee Department created successfully"),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeDepartment"
     *        )
     *      )
     *      ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
     * @OA\Get(
     *   tags={"EmployeeDepartment"},
     *   path="/api/v1/employee-departments/{id}",
     *   security={{"sanctum ":{}}},
     *   summary="Get specific employee department",
     *   @OA\Parameter(
     *      name="id",
     *      description="id of employee department table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(
     *      response=200, 
     *      description="OK",
     *      @OA\JsonContent(ref="#/components/schemas/EmployeeDepartment"),
     *      ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * 
     * @param  \App\Models\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDepartment $employeeDepartment)
    {
        return response()->json($employeeDepartment);
    }


    /**
     * @OA\Put(
     *   tags={"EmployeeDepartment"},
     *   path="/api/v1/employee-departments/{id}",
     *   security={{"sanctum ":{}}},
     *   summary="Update specified in employee department storage ",
     *   @OA\Parameter(
     *      name="id",
     *      description="id of employee department table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="department_code",
     *     in="query",
     *     required=true,
     *     description="department code property",
     *     @OA\Schema(type="string",example="ITD")
     *   ),
     *   @OA\Parameter(
     *     name="department",
     *     in="query",
     *     required=true,
     *     description="department property",
     *     @OA\Schema(type="string",example="Information Technology Department")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="The description of department",
     *     @OA\Schema(type="string",example="Information the department is awesome")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="The property for sorting data",
     *     @OA\Schema(type="integer",example="1000")
     *   ),
     *   @OA\Response(
     *       response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(property="message", type="string",example="Employee Department updated successfully"),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeDepartment"
     *        )
     *      )
     *      ),
     *     )
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
     * @OA\Delete(
     *   tags={"EmployeeDepartment"},
     *   path="/api/v1/employee-departments/{id}",
     *   security={{"sanctum ":{}}},
     *   summary="Get specific employee department",
     *   @OA\Parameter(
     *      name="id",
     *      description="id of employee department table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(
     *       response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(property="message", type="string",example="Employee Department deleted successfully"),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeDepartment"
     *        )
     *      )
     *      ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
