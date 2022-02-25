<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PageSubMenu;
use App\Models\UserHasPageSubMenu;
use Illuminate\Http\Request;

class PageMenuManagementOfUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $per_page = $request->query('per_page') ?? 15;
        $search = $request->query('search');
        $pageSubMenus = PageSubMenu::with('page_menu')
            ->with('users', function ($query) use ($user) {
                $query->where('users.id', $user->id)->select('users.id', 'users.username', 'users.email');
            })
            ->orderBy('sorting_number', 'asc')
            ->paginate($per_page);

        return response()->json($pageSubMenus);
    }

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
