<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageSubMenuRequest;
use App\Http\Requests\UpdatePageSubMenuRequest;
use App\Models\PageSubMenu;

class PageSubMenuController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"PageSubMenu"},
     *   path="/api/v1/page-sub-menus",
     *   summary="Display a listing of the page sub menus resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/PageSubMenuAndPageMenu")
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            PageSubMenu::with('page_menu')
                ->orderBy('sorting_number', 'asc')
                ->get()
        );
    }

    /**
     * @OA\Post(
     *   tags={"PageSubMenu"},
     *   path="/api/v1/page-sub-menus",
     *   summary="Store a newly created resource in page sub menu storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="page_menu_id",
     *     in="query",
     *     required=true,
     *     description="The page menu id property",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="title",
     *     in="query",
     *     required=true,
     *     description="The title property",
     *     @OA\Schema(type="string",example="Maintenance")
     *   ),
     *   @OA\Parameter(
     *     name="page_directory",
     *     in="query",
     *     required=true,
     *     description="The page directory property",
     *     @OA\Schema(type="string",example="/maintenance")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     required=true,
     *     description="The description property",
     *     @OA\Schema(type="string",example="Maintenance for page in accounting")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="The sorting number property",
     *     @OA\Schema(type="integer",example="100")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Page sub menu created successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/PageSubMenu"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param App\Http\Requests\StorePageSubMenuRequest   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageSubMenuRequest $request)
    {
        $pageSubMenu = PageSubMenu::create($request->all());
        return response()->json([
            "message" => "Page sub menu created successfully",
            "data"    => $pageSubMenu,
        ]);
    }

    /**
     * @OA\Get(
     *   tags={"PageSubMenu"},
     *   path="/api/v1/page-sub-menus/{id}",
     *   summary="Display the specified page sub menu resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id of page sub menu resource",
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
     *       ref="#/components/schemas/PageSubMenu"
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\PageSubMenu  $pageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function show(PageSubMenu $pageSubMenu)
    {
        return response()->json($pageSubMenu);
    }

    /**
     * @OA\Put(
     *   tags={"PageSubMenu"},
     *   path="/api/v1/page-sub-menus/{id}",
     *   summary="Update the specified resource in page sub menu storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id of page sub menu resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="page_menu_id",
     *     in="query",
     *     required=true,
     *     description="The page menu id property",
     *     @OA\Schema(type="integer",example="1")
     *   ),
     *   @OA\Parameter(
     *     name="title",
     *     in="query",
     *     required=true,
     *     description="The title property",
     *     @OA\Schema(type="string",example="Maintenance")
     *   ),
     *   @OA\Parameter(
     *     name="page_directory",
     *     in="query",
     *     required=true,
     *     description="The page directory property",
     *     @OA\Schema(type="string",example="/maintenance")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     required=true,
     *     description="The description property",
     *     @OA\Schema(type="string",example="Maintenance for page in accounting")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="The sorting number property",
     *     @OA\Schema(type="integer",example="100")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Page Sub Menu updated successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/PageSubMenu"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
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
            "data"    => $pageSubMenu,
        ]);
    }

    /**
     *
     *  @OA\Delete(
     *   tags={"PageSubMenu"},
     *   path="/api/v1/page-sub-menus/{id}",
     *   summary="Remove the specified resource from  page sub menus storage",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id of page sub menu resource",
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
     *         property="message",
     *         type="string",
     *         example="Page Sub Menu deleted successfully"
     *       ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/PageSubMenu"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * .
     *
     * @param  \App\Models\PageSubMenu  $pageSubMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageSubMenu $pageSubMenu)
    {
        $pageSubMenu->delete();
        return response()->json([
            "message" => "Page Sub Menu deleted successfully",
            "data"    => $pageSubMenu,
        ]);
    }
}
