<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $users = User::search($search)
            ->orderBy('username', 'asc')
            ->paginate($per_page);
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     * @OA\Post(
     *   tags={"User"},
     *   path="/api/v1/users",
     *   security={{"sanctum ":{}}},
     *   summary="Create new user access",
     *   @OA\Parameter(
     *     name="username",
     *     in="query",
     *     required=true,
     *     description="username for new user access",
     *     @OA\Schema(type="string",example="beautifully")
     *   ),
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     required=true,
     *     description="email for new user access",
     *     @OA\Schema(type="string",example="beautifully@pt-saa.com")
     *   ),
     *   @OA\Parameter(
     *     name="password",
     *     in="query",
     *     required=true,
     *     description="password for new user access",
     *     @OA\Schema(type="string",example="beautifully")
     *   ),
     *   @OA\Parameter(
     *     name="password_confirm",
     *     in="query",
     *     required=true,
     *     description="password_conform to confirm password for new user access",
     *     @OA\Schema(type="string",example="beautifully")
     *   ),
     *   @OA\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     description="role for new user access",
     *     @OA\Schema(type="string",example="user")
     *   ),
     *   @OA\Parameter(
     *     name="user_group",
     *     in="query",
     *     required=true,
     *     description="user_group for new user access",
     *     @OA\Schema(type="string",example="EDP")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="success create new user"
     *        ),
     *       @OA\Property(
     *         property="user",
     *         type="object",
     *         ref="#/components/schemas/User"
     *         )
     *       )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * @return \App\Http\Requests\UserRequest
     */
    public function store(UserRequest $request)
    {
        $password_hash = Hash::make($request->password);

        $user = User::create([
            "username"   => $request->username,
            "email"      => $request->email,
            "role"       => $request->role,
            "user_group" => $request->user_group,
            "password"   => $password_hash,
        ]);
        return response()->json(["message" => "Success create new user", "user" => $user]);
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @OA\Get(
     *   tags={"User"},
     *   path="/api/v1/users/1",
     *   security={{"sanctum ":{}}},
     *   summary="Get Specific user information",
     *   @OA\Parameter(
     *     name="id",
     *     description="id of user to retrieve",
     *     example="1",
     *     in="query"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\JsonContent(ref="#/components/schemas/User")
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user, );
    }

    /**
     * Show the form for creating a new resource.
     * @OA\Put(
     *   tags={"User"},
     *   path="/api/v1/users/id",
     *   security={{"sanctum ":{}}},
     *   summary="Update specified user record access",
     *   @OA\Parameter(
     *     name="id",
     *     description="id of user to retrieve",
     *     example="1",
     *     in="query"
     *   ),
     *   @OA\Parameter(
     *     name="username",
     *     in="query",
     *     required=true,
     *     description="username for new user access",
     *     @OA\Schema(type="string",example="beautifully")
     *   ),
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     required=true,
     *     description="email for new user access",
     *     @OA\Schema(type="string",example="beautifully@pt-saa.com")
     *   ),
     *   @OA\Parameter(
     *     name="role",
     *     in="query",
     *     required=true,
     *     description="role for new user access",
     *     @OA\Schema(type="string",example="user")
     *   ),
     *   @OA\Parameter(
     *     name="user_group",
     *     in="query",
     *     required=true,
     *     description="user_group for new user access",
     *     @OA\Schema(type="string",example="EDP")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Update user successfully"
     *        ),
     *       @OA\Property(
     *         property="user",
     *         type="object",
     *         ref="#/components/schemas/User"
     *         )
     *       )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id)->update([
            "username"   => $request->username,
            "email"      => $request->email,
            "role"       => $request->role,
            "user_group" => $request->user_group,
        ]);

        return response()->json([
            "message" => "Update user successfully",
            "user"    => $user,
        ]);
    }
}
