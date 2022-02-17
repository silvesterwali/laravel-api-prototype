<?php

namespace App\Http\Controllers;

use App\Models\PageSubMenu;
use Illuminate\Http\Request;
use App\Http\Requests\StorePageSubMenuRequest;
use App\Http\Requests\UpdatePageSubMenuRequest;

class PageSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PageSubMenu::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StorePageSubMenuRequest   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageSubMenuRequest $request)
    {
        $pageSubMenu = PageSubMenu::create($request->all());
        return response()->json([
            "message" => "Page sub menu created successfully",
            "data" => $pageSubMenu
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageSubMenu  $pageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function show(PageSubMenu $pageSubMenu)
    {
        return response()->json($pageSubMenu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdatePageSubMenuRequest  $request
     * @param  \App\Models\PageSubMenu  $pageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageSubMenuRequest $request, PageSubMenu $pageSubMenu)
    {
        $pageSubMenu->update($request->only($pageSubMenu->fillable));
        return response()->json([
            "message" => "Page Sub Menu updated successfully",
            "data" => $pageSubMenu
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageSubMenu  $pageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageSubMenu $pageSubMenu)
    {
        $pageSubMenu->delete();
        return response()->json([
            "message" => "Page Sub Menu deleted successfully",
            "data" => $pageSubMenu
        ]);
    }
}
