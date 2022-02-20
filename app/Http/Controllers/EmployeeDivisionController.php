<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDivision;
use App\Http\Requests\StoreEmployeeDivisionRequest;
use App\Http\Requests\UpdateEmployeeDivisionRequest;

class EmployeeDivisionController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"EmployeeDivision"},
     *   path="/api/v1/employee-divisions",
     *   summary="Display a listing of employee division response",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *      response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/EmployeeDivision")
     *      )
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
        return response()->json(EmployeeDivision::orderBy('sorting_number', 'asc')->get());
    }
    /**
     * @OA\Post(
     *   tags={"EmployeeDivision"},
     *   path="/api/v1/employee-division",
     *   summary="Store a newly created resource in employee divisions storage",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="division_code",
     *     in="query",
     *     required=true,
     *     description="division code property",
     *     @OA\Schema(type="string",example="EDP")
     *   ),
     *   @OA\Parameter(
     *     name="division",
     *     in="query",
     *     required=true,
     *     description="division property",
     *     @OA\Schema(type="string",example="My division")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="description property",
     *     @OA\Schema(type="string",example="this division is awesome")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="sort the listing according to user preferences",
     *     @OA\Schema(type="string",example="ITD")
     *   ),
     *   @OA\Response(
     *      response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(
     *              property="message", type="string",example="Employee Division created successfully"
     *          ),
     *          @OA\Property(
     *             property="data",
     *             type="Object",
     *             ref="#/components/schemas/EmployeeDivision"
     *          )
     *      ),
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * .
     *
     * @param  \App\Http\Requests\StoreEmployeeDivisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeDivisionRequest $request)
    {
        $employeeDivision = EmployeeDivision::create($request->all());
        return response()->json([
            "message" => "Employee Division created successfully",
            "data" => $employeeDivision
        ]);
    }

    /**
     * @OA\Get(
     *   tags={"EmployeeDivision"},
     *   path="/api/v1/employee-divisions/{id}",
     *   summary="Display the specified resource from employee division",
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee division table",
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
     *        ref="#/components/schemas/EmployeeDivision"
     *      )),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * 
     *
     * @param  \App\Models\EmployeeDivision  $employeeDivision
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDivision $employeeDivision)
    {
        return response()->json($employeeDivision);
    }

    /**
     * @OA\Put(
     *   tags={"EmployeeDivision"},
     *   path="/api/v1/employee-division/{id}",
     *   summary="Update the specified resource in employee division storage ",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee division table",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="division_code",
     *     in="query",
     *     required=true,
     *     description="division code property",
     *     @OA\Schema(type="string",example="EDP")
     *   ),
     *   @OA\Parameter(
     *     name="division",
     *     in="query",
     *     required=true,
     *     description="division property",
     *     @OA\Schema(type="string",example="My division")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     description="description property",
     *     @OA\Schema(type="string",example="this division is awesome")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="sort the listing according to user preferences",
     *     @OA\Schema(type="string",example="ITD")
     *   ),
     *   @OA\Response(
     *      response=200, 
     *      description="OK",
     *      @OA\JsonContent(
     *          type="object",
     *          @OA\Property(
     *              property="message", type="string",example="Employee Division updated successfully"
     *          ),
     *          @OA\Property(
     *             property="data",
     *             type="Object",
     *             ref="#/components/schemas/EmployeeDivision"
     *          )
     *      ),
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * ).
     *
     * @param  \App\Http\Requests\UpdateEmployeeDivisionRequest  $request
     * @param  \App\Models\EmployeeDivision  $employeeDivision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeDivisionRequest $request, EmployeeDivision $employeeDivision)
    {
        $employeeDivision->update($request->only($employeeDivision->fillable));
        return response()->json([
            "message" => "Employee Division updated successfully",
            "data" => $employeeDivision
        ]);
    }


    /**
     * @OA\Delete(
     *   tags={"EmployeeDivision"},
     *   path="/api/v1/employee-division/{id}",
     *   summary="Delete the specified resource in employee division storage ",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id the employee division table",
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
     *          type="object",
     *          @OA\Property(
     *              property="message", type="string",example="Employee Division delete successfully"
     *          ),
     *          @OA\Property(
     *             property="data",
     *             type="Object",
     *             ref="#/components/schemas/EmployeeDivision"
     *          )
     *      ),
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * ).
     * 
     *
     * @param  \App\Models\EmployeeDivision  $employeeDivision
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeDivision $employeeDivision)
    {
        $employeeDivision->delete();
        return response()->json([
            "message" => "Employee Division delete successfully",
            "data" => $employeeDivision
        ]);
    }
}
