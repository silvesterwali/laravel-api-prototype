<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityPermissionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Permission"},
     *   path="/api/v1/permissions?page=1&per_page=50&search=search",
     *   security={{"sanctum ":{}}},
     *   summary="Get all permissions with pagination.by default it taken 50 record for every request. you can do search ?search=mysearch in this endpoint",
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
     *          @OA\Items(
     *            @OA\Property(
     *              property="id",
     *              type="integer",
     *              example="1"
     *            ),
     *            @OA\Property(
     *              property="name",
     *              type="string",
     *              example="Edit Article"
     *            ),
     *            @OA\Property(
     *              property="module",
     *              type="string",
     *              example="IT Development"
     *            ),
     *            @OA\Property(
     *              property="guard_name",
     *              type="String",
     *              example="Web"
     *            ),
     *            @OA\Property(
     *              property="description",
     *              type="string",
     *              example="This example of permission"
     *            )
     *          )
     *        ),
     *        @OA\Property(
     *          property="path",
     *          type="string",
     *          description="path information of url",
     *          example="http://localhost:8000/api/v1/permissions"
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
     */
    public function index(Request $request)
    {
        $permission = Permission::query();
        if (!empty($request->query('search'))) {
            $permission->where('name', 'ilike', "%{$request->query('search')}%")
                ->orWhere('module', 'ilike', "%{$request->query('search')}%");
        }
        $per_page = $request->query('per_page');
        $permissions = $permission->paginate($per_page ?? 15);
        return response()->json($permissions);
    }
    /**
     * @OA\Post(
     *   tags={"Permission"},
     *   path="/api/v1/give-permission",
     *   summary="Give permission (spatie) to user. so user will have access to do something belonging to given permissions",
     *   operationId="permission",
     *   @OA\Parameter(
     *     name="user_id",
     *     in="query",
     *     required=true,
     *     description="user_id of user to be granted access",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="permission",
     *     in="query",
     *     required=true,
     *     description="permission to be granted",
     *     @OA\Schema(type="string",example="Edit Article")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Success give permission to user"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param  \App\Http\Requests\ActivityPermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function give_permission(ActivityPermissionRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $permission = Permission::findOrFail($request->permission);
        $user->givePermissionTo($permission->name);
        return response()->json(["message" => "Success give permission to user"], 200);
    }

    /**
     * @OA\Post(
     *   tags={"Permission"},
     *   path="/api/v1/revoke-permission",
     *   summary="Revoke permission (spatie) from user. so user will have no access to do something belonging to permissions",
     *   @OA\Parameter(
     *     name="user_id",
     *     in="query",
     *     required=true,
     *     description="user_id of user to be granted access",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="permission",
     *     in="query",
     *     required=true,
     *     description="permission to be granted",
     *     @OA\Schema(type="string",example="Edit Article")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Success give permission to user"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @param  \App\Http\Requests\ActivityPermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function revoke_permission(ActivityPermissionRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $permission = Permission::findOrFail($request->permission);
        $user->revokePermissionTo($permission->name);
        return response()->json(["message" => "Success give permission to user"], 200);
    }
}
