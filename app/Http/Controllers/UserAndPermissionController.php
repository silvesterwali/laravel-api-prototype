<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreUserAndPermissionRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyToGroupApi;
use App\Enum\GiveAndRevokePermission;
use App\Events\NotifyToBotDeveloper;

class UserAndPermissionController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Permission"},
     *   path="/api/v1/user-and-permission/{user}?page=1&search=",
     *   security={{"sanctum ":{}}},
     *   summary="Get all permissions with specific user filter",
     *   @OA\Parameter(
     *     name="id",
     *     description="id of user to retrieve",
     *     example="1",
     *     in="query"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *        @OA\Property(
     *          property="current_page",
     *          type="integer",
     *          example="1",
     *          description="showing current page of data pagination"
     *        ),
     *       @OA\Property(
     *         property="data",
     *         type="array",
     *         @OA\Items(ref="#/components/schemas/PermissionAndUser")
     *       ),
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
     *     )
     *   )
     * )
     */
    public function index(Request $request, User $user)
    {
        $search = $request->query('search');
        $per_page = $request->query('per_page') ?? 15;
        $query = Permission::query();
        $query->with('users', function ($query) use ($user) {
            $query->where('id', $user->id)->select('id', 'username', 'email');
        });

        $query->when($search, function ($query) use ($search) {
            $query->where('name', 'ilike', "%{$search}%")
                ->orWhere('module', 'ilike', "%{$search}%")
                ->orWhere('description', 'ilike', "%{$search}%");
        });


        $query->orderBy('name', 'asc');
        $permissions = $query->paginate($per_page);
        return response()->json($permissions);
    }


    /**
     * @OA\Post(
     *   tags={"Permission"},
     *   path="/api/v1/user-and-permission/give-permission",
     *   security={{"sanctum ":{}}},
     *   summary="Give a permission to user",
     *   @OA\Parameter(
     *     name="user_id",
     *     in="query",
     *     required=true,
     *     description="the user id to give permission",
     *     @OA\Schema(type="string",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="permission_id",
     *     in="query",
     *     required=true,
     *     description="The permission id to given to the user",
     *     @OA\Schema(type="string",example="1")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="message",
     *          type="string",
     *          example="Permission granted to user successfully"
     *        )
     *     )
     *  ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function give_permission(StoreUserAndPermissionRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $permission = Permission::findOrFail($request->permission_id);
        $user->givePermissionTo($permission);

        NotifyToBotDeveloper::dispatch($user, $permission, GiveAndRevokePermission::Give);

        return response()->json([
            "message" => "Permission granted to user successfully"
        ]);
    }


    /**
     * @OA\Post(
     *   tags={"Permission"},
     *   path="/api/v1/user-and-permission/revoke-permission",
     *   security={{"sanctum ":{}}},
     *   summary="Revoke a permission to user",
     *   @OA\Parameter(
     *     name="user_id",
     *     in="query",
     *     required=true,
     *     description="the user id to give permission",
     *     @OA\Schema(type="string",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="permission_id",
     *     in="query",
     *     required=true,
     *     description="The permission id to given to the user",
     *     @OA\Schema(type="string",example="1")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="message",
     *          type="string",
     *          example="Permission revoke from user successfully")
     *     )
     * ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function revoke_permission(StoreUserAndPermissionRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $permission = Permission::findOrFail($request->permission_id);
        $user->revokePermissionTo($permission->name);
        NotifyToBotDeveloper::dispatch($user, $permission, GiveAndRevokePermission::Revoke);

        return response()->json([
            "message" => "Permission revoke from user successfully"
        ]);
    }
}
