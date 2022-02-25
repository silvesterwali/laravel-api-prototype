<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PageSubMenu;
use App\Models\UserHasPageSubMenu;
use Illuminate\Http\Request;

class PageMenuManagementOfUserController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"PageSubMenu"},
     *   path="/api/v1/page-menu-management-of-user/{user}?page=1&search=",
     *   summary="Get all page sub menus with specify filter for specific user. The data will be formatted as pagination. And also support for do search in page sub menus resource",
     *   @OA\Parameter(
     *      name="user",
     *      description="id of user resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
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
     *          @OA\Items(ref="#/components/schemas/PageSubMenuAndPageMenu"),
     *          ),
     *        @OA\Property(
     *          property="path",
     *          type="string",
     *          description="path information of url",
     *          example="http://localhost:8000/api/v1/page-menu-managaement-of-user/{user}"
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $per_page = $request->query('per_page') ?? 15;
        $search = $request->query('search');
        $query = PageSubMenu::query();

        $query->when($search, function ($query) use ($search) {
            return $query->where('title', 'ilike', "%{$search}%")
                ->orWhere("description", "ilike", "%{$search}%")
                ->orWhereHas('page_menu', function ($query) use ($search) {
                    $query->where('title', 'ilike', "%{$search}%")
                        ->orWhere("description", 'ilike', "%{$search}%");
                });
        });

        $query->with('page_menu')
            ->with('users', function ($query) use ($user) {
                $query->where('users.id', $user->id)->select('users.id', 'users.username', 'users.email');
            })
            ->orderBy('sorting_number', 'asc');
        $pageSubMenus = $query->paginate($per_page);
        return response()->json($pageSubMenus);
    }

    /**
     * @OA\Delete(
     *   tags={"UserHasSubMenu"},
     *   path="/api/page-menu-management-of-user/page-sub-meu/{page_sub_menu}/user/{user}",
     *   summary="PageMenuManagementOfUser destroy",
     *   @OA\Parameter(
     *      name="page_sub_menu",
     *      description="id of page sub menu resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
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
     *       type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="User page sub menu deleted successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/UserHasPageSubMenu"
     *        )
     *     )
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function destroy(PageSubMenu $pageSubMenu, User $user)
    {
        $UserHasPageSubMenu = UserHasPageSubMenu::where('user_id', $user->id)->where('page_sub_menu_id', $pageSubMenu->id)->first();
        $UserHasPageSubMenu->delete();
        return response()->json([
            "message" => "User page sub menu deleted successfully",
            "data" => $UserHasPageSubMenu
        ]);
    }
}
