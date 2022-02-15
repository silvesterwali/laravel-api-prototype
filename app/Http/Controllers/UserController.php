<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     * @OA\Get(
     *   tags={"User"},
     *   path="/api/v1/users?page=1&per_page=50&search=search",
     *   security={{"sanctum ":{}}},
     *   summary="Get all users with pagination.by default it taken 50 record for every request. you can do search ?search=mysearch in this endpoint",
     *   @OA\Parameter(
     *     name="page",
     *     description="number of page for retrieve data as pagination",
     *     example="1",
     *     in="query"
     *   ),
     *   @OA\Parameter(
     *     name="per_page",
     *     description="parameter to for per page data with be retrieve",
     *     example="50",
     *     in="query"
     *   ),
     *   @OA\Parameter(
     *     name="search",
     *     description="parameter to for search something similar",
     *     example="IT Dev",
     *     in="query"
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="current_page",
     *          type="integer",
     *          example="1",
     *          description="showing current page of data pagination"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="array",
     *          description="data of pagination",
     *          @OA\Items(ref="#/components/schemas/User"),
     *          ),
     *        @OA\Property(
     *          property="path",
     *          type="string",
     *          description="path information of url",
     *          example="http://localhost:8000/api/v1/users"
     *        ),
     *          @OA\Property(
     *            property="last_page",
     *            type="integer",
     *            description="showing the last page of pagination",
     *            example="4"
     *          ),
     *          @OA\Property(
     *            property="per_page",
     *            type="integer",
     *            example="50",
     *            description="showing item display for every request"
     *          ),
     *          @OA\Property(
     *            property="total",
     *            type="integer",
     *            example="50",
     *            description="showing all total of record according the query"
     *          )
     *      )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page') ?? 15;
        $search = $request->query('search');
        $users = User::query();
        if ($search) {
            $users->where('username', 'ilike', "%{$search}%")
                ->orWhere('email', 'ilike', "%{$search}%");
        }

        $user = $users->orderBy('username', 'asc')->paginate($per_page);
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
