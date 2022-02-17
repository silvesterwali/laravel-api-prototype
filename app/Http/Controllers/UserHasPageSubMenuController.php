<?php

namespace App\Http\Controllers;

use App\Models\UserHasPageSubMenu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserHasPageSubMenuRequest;
use App\Models\PageMenu;

class UserHasPageSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
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
