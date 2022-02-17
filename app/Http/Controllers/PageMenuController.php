<?php

namespace App\Http\Controllers;

use App\Models\PageMenu;
use App\Http\Requests\StorePageMenuRequest;
use App\Http\Requests\UpdatePageMenuRequest;

class PageMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PageMenu::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageMenuRequest $request)
    {
        $pageMenu = PageMenu::create($request->all());
        return response()->json([
            "message" => "Page menu created successfully",
            "data" => $pageMenu
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageMenu  $pageMenu
     * @return \Illuminate\Http\Response
     */
    public function show(PageMenu $pageMenu)
    {
        return response()->json($pageMenu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageMenuRequest $request
     * @param  \App\Models\PageMenu  $pageMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageMenuRequest $request, PageMenu $pageMenu)
    {
        $pageMenu->update($request->only($pageMenu->fillable));
        return response()->json([
            "message" => "page menu updated successfully",
            "data" => $pageMenu
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageMenu  $pageMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageMenu $pageMenu)
    {
        $pageMenu->delete();
        return response()->json([
            "message" => "page menu deleted successfully",
            "data" => $pageMenu
        ]);
    }
}
