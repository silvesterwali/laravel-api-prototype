<?php

namespace App\Http\Controllers;

use App\Models\UserHasPageSubMenu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserHasPageSubMenuRequest;
use App\Models\PageMenu;
use App\Models\User;

class UserHasPageSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);
        $user_has_page_sub_menus = $user->has_page_sub_menus;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUserHasPageSubMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserHasPageSubMenuRequest $request)
    {
        $userHasPageSubMenu = UserHasPageSubMenu::create($request->all());
        return response()->json([
            "message" => "User page sub menu created successfully",
            "data" => $userHasPageSubMenu
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHasPageSubMenu  $userHasPageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHasPageSubMenu $userHasPageSubMenu)
    {
        $userHasPageSubMenu->delete();
        return response()->json([
            "message" => "user has page sub menu deleted successfully",
            "data" => $userHasPageSubMenu
        ]);
    }
}
