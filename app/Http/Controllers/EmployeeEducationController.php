<?php

namespace App\Http\Controllers;

use App\Models\EmployeeEducation;
use App\Http\Requests\StoreEmployeeEducationRequest;
use App\Http\Requests\UpdateEmployeeEducationRequest;

class EmployeeEducationController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"EmployeeEducation"},
     *   path="/api/v1/employee-education",
     *   summary="Display a listing of the employee education resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/EmployeeEducation")
     *     )
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
        return response()->json(EmployeeEducation::get());
    }

    /**
     * @OA\Post(
     *   tags={"EmployeeEducation"},
     *   path="/api/v1/employee-education",
     *   summary="Store a newly created resource in employee education storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="education_code",
     *     in="query",
     *     required=true,
     *     description="education code property",
     *     @OA\Schema(type="string",example="S1")
     *   ),
     *   @OA\Parameter(
     *     name="education",
     *     in="query",
     *     required=true,
     *     description="education code property",
     *     @OA\Schema(type="string",example="Strata Satu")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Employee Education created successfully",
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeEducation"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Http\Requests\StoreEmployeeEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeEducationRequest $request)
    {
        $employeeEducation = EmployeeEducation::create($request->validated());
        return response()->json([
            "message" => "Employee Education created successfully",
            "data" => $employeeEducation
        ]);
    }

    /**
     * @OA\Get(
     *   tags={"EmployeeEducation"},
     *   path="/api/v1/employee-education/{id}",
     *   summary="Display the specified employee education resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee education resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Response(
     *     response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        ref="#/components/schemas/EmployeeEducation"
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\EmployeeEducation  $employeeEducation
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeEducation $employeeEducation)
    {
        return response()->json($employeeEducation);
    }


    /**
     * @OA\Put(
     *   tags={"EmployeeEducation"},
     *   path="/api/v1/employee-education/{id}",
     *   summary="Update the specified resource in employee education storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee education resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="education_code",
     *     in="query",
     *     required=true,
     *     description="education code property",
     *     @OA\Schema(type="string",example="S1")
     *   ),
     *   @OA\Parameter(
     *     name="education",
     *     in="query",
     *     required=true,
     *     description="education code property",
     *     @OA\Schema(type="string",example="Strata Satu")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Employee Education updated successfully",
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeEducation"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Http\Requests\UpdateEmployeeEducationRequest  $request
     * @param  \App\Models\EmployeeEducation  $employeeEducation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeEducationRequest $request, EmployeeEducation $employeeEducation)
    {
        $employeeEducation->update($request->validated);
        return response()->json([
            "message" => "Employee Education updated successfully",
            "data" => $employeeEducation
        ]);
    }


    /**
     * @OA\Delete(
     *   tags={"EmployeeEducation"},
     *   path="/api/v1/employee-education/{id}",
     *   summary="Remove the specified resource from employee education storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee education resource",
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
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Employee Education deleted successfully",
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/EmployeeEducation"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\EmployeeEducation  $employeeEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeEducation $employeeEducation)
    {
        $employeeEducation->delete();
        return response()->json([
            "message" => "Employee Education deleted successfully",
            "data" => $employeeEducation
        ]);
    }
}
