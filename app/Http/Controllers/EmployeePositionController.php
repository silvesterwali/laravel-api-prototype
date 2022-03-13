<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeePositionRequest;
use App\Http\Requests\UpdateEmployeePositionRequest;
use App\Models\EmployeePosition;

class EmployeePositionController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"EmployeePosition"},
     *   path="/api/v1/employee-positions",
     *   summary="Display a listing of the employee positions resource",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/EmployeePosition")
     *      )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeePosition::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * @OA\Post(
     *   tags={"EmployeePosition"},
     *   path="/api/v1/employees-positions",
     *   summary="Store a newly created resource in employee position storage",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="position_code",
     *     in="query",
     *     required=true,
     *     description="Position code property",
     *     @OA\Schema(type="string",example="STF")
     *   ),
     *   @OA\Parameter(
     *     name="position",
     *     in="query",
     *     required=true,
     *     description="Position property",
     *     @OA\Schema(type="string",example="STF")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="description property",
     *     @OA\Schema(type="string",example="This position is awesome")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="sorting number  property",
     *     @OA\Schema(type="string",example="1000")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message", type="string",example="Employee Position created successfully",
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeePosition"
     *        )
     *      )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * .
     *
     * @param  \App\Http\Requests\StoreEmployeePositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeePositionRequest $request)
    {
        $employeePosition = EmployeePosition::create($request->all());
        return response()->json([
            "message" => "Employee Position created successfully",
            "data"    => $employeePosition,
        ]);
    }

    /**
     * @OA\Get(
     *   tags={"EmployeePosition"},
     *   path="/api/v1/employees-positions/{id}",
     *   summary="Display the specified employee position resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee position table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        ref="#/components/schemas/EmployeePosition"
     *      )
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePosition $employeePosition)
    {
        return response()->json($employeePosition);
    }

    /**
     * @OA\Put(
     *   tags={"EmployeePosition"},
     *   path="/api/v1/employees-positions/{id}",
     *   summary="Update the specified resource in employee position storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee position table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="position_code",
     *     in="query",
     *     required=true,
     *     description="Position code property",
     *     @OA\Schema(type="string",example="STF")
     *   ),
     *   @OA\Parameter(
     *     name="position",
     *     in="query",
     *     required=true,
     *     description="Position property",
     *     @OA\Schema(type="string",example="STF")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="description property",
     *     @OA\Schema(type="string",example="This position is awesome")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="sorting number  property",
     *     @OA\Schema(type="string",example="1000")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message", type="string",example="Employee position updated successfully",
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeePosition"
     *        )
     *      )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Http\Requests\UpdateEmployeePositionRequest  $request
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeePositionRequest $request, EmployeePosition $employeePosition)
    {
        $employeePosition->update($request->only($employeePosition->fillable));
        return response()->json(
            [
                "message" => "Employee position updated successfully",
                "data"    => $employeePosition,
            ]
        );
    }

    /**
     * @OA\Delete(
     *   tags={"EmployeePosition"},
     *   path="/api/v1/employees-positions/{id}",
     *   summary="Remove the specified resource from employee position storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee position table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message", type="string",example="Employee position deleted successfully",
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeePosition"
     *        )
     *      )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePosition $employeePosition)
    {
        $employeePosition->delete();
        return response()->json([
            "message" => "Employee position deleted successfully",
            "data"    => $employeePosition,
        ]);
    }
}
