<?php

namespace App\Http\Controllers;

use App\Models\UserHasPageSubMenu;
use App\Http\Requests\StoreUserHasPageSubMenuRequest;
use App\Models\PageMenu;
use App\Models\User;

class UserHasPageSubMenuController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"UserHasSubMenu"},
     *   path="/api/v1/user-has-page-sub-menus/{user}",
     *   summary="Display a listing of the page and page sub menus for user resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="user",
     *      description="id of user resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/PageAndPageSubMenu")
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $pageMenus = PageMenu::with(['page_sub_menus' => function ($query) use ($user) {
            $query->whereHas('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })->has('users')->orderBy('sorting_number', 'asc');
        }])
            ->whereHas('page_sub_menus', function ($query) {
                $query->has('users', '>', 0);
            })
            ->orderBy('sorting_number', 'asc')->get();

        return response()->json($pageMenus);
    }

    /**
     * @OA\Post(
     *   tags={"UserHasSubMenu"},
     *   path="/api/v1/user-has-page-sub-menus",
     *   summary="Store a newly created resource in user has sub menu storage. Give user to access page in front end",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="user_id",
     *     in="query",
     *     required=true,
     *     description="The user_id property",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="page_sub_menu_id",
     *     in="query",
     *     required=true,
     *     description="The page_sub_menu_id property",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="User page sub menu created successfully"
     *        ),
     *       @OA\Property(
     *         property="data",
     *         type="integer",
     *         ref="1"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  App\Http\Requests\StoreUserHasPageSubMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserHasPageSubMenuRequest $request)
    {
        $userHasPageSubMenu = UserHasPageSubMenu::insertOrIgnore($request->validated());
        return response()->json([
            "message" => "User page sub menu created successfully",
            "data" => $userHasPageSubMenu
        ]);
    }



    /**
     * @OA\Delete(
     *   tags={"UserHasSubMenu"},
     *   path="/api/v1/user-has-page-sub-menus/{id}",
     *   summary="Remove the specified resource from  user has page sub menus storage. Revoke user access for specific page sub menus",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id of user has page sub menus resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="User has page sub menu deleted successfully"
     *        ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/UserHasPageSubMenu"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\UserHasPageSubMenu  $userHasPageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHasPageSubMenu $userHasPageSubMenu)
    {
        $userHasPageSubMenu->delete();
        return response()->json([
            "message" => "User has page sub menu deleted successfully",
            "data" => $userHasPageSubMenu
        ]);
    }
}
