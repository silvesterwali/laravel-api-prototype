<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageMenuRequest;
use App\Http\Requests\UpdatePageMenuRequest;
use App\Models\PageMenu;

class PageMenuController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"PageMenu"},
     *   path="/api/v1/page-menus",
     *   summary="Display a listing of the page menu resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/PageMenu")
     *      ),
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PageMenu::orderBy('sorting_number', 'asc')->get());
    }

    /**
     * @OA\Post(
     *   tags={"PageMenu"},
     *   path="/api/v1/page-menus",
     *   summary="Store a newly created resource in page menu storage",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *     name="title",
     *     in="query",
     *     required=true,
     *     description="The title property",
     *     @OA\Schema(type="string",example="Accounting")
     *   ),
     *   @OA\Parameter(
     *     name="page_directory",
     *     in="query",
     *     required=true,
     *     description="The page directory property",
     *     @OA\Schema(type="string",example="/accounting")
     *   ),
     *   @OA\Parameter(
     *     name="icon_class",
     *     in="query",
     *     required=true,
     *     description="The icon class property like mdi or font awesome",
     *     @OA\Schema(type="string",example="mdi-apps")
     *   ),
     *   @OA\Parameter(
     *     name="module",
     *     in="query",
     *     required=true,
     *     description="The module property",
     *     @OA\Schema(type="string",example="accounting")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="The sorting number property for apply costume sorting by user",
     *     @OA\Schema(type="integer",example="10")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     required=true,
     *     description="The description property for user for meta too",
     *     @OA\Schema(type="string",example="This feature is awesome by default")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Page menu created successfully"
     *        ),
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          ref="#/components/schemas/PageMenu"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * .
     *
     * @param  \App\Http\Requests\StorePageMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageMenuRequest $request)
    {
        $pageMenu = PageMenu::create($request->validated());
        return response()->json([
            "message" => "Page menu created successfully",
            "data"    => $pageMenu,
        ]);
    }

    /**
     * @OA\Get(
     *   tags={"PageMenu"},
     *   path="/api/v1/page-menus/{id}",
     *   summary="Display the specified page menu resource.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id of page menu resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(ref="#/components/schemas/PageMenu")
     *      )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\PageMenu  $pageMenu
     * @return \Illuminate\Http\Response
     */
    public function show(PageMenu $pageMenu)
    {
        return response()->json($pageMenu);
    }

    /**
     * @OA\Put(
     *   tags={"PageMenu"},
     *   path="/api/v1/page-menus/{id}",
     *   summary="Update the specified resource in page menu storage.",
     *   security={{"sanctum ":{}}},
     *   @OA\Parameter(
     *      name="id",
     *      description="id of page menu resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer",example="1"
     *         )
     *      ),
     *   @OA\Parameter(
     *     name="page_directory",
     *     in="query",
     *     required=true,
     *     description="The page directory property",
     *     @OA\Schema(type="string",example="/accounting")
     *   ),
     *   @OA\Parameter(
     *     name="icon_class",
     *     in="query",
     *     required=true,
     *     description="The icon class property like mdi or font awesome",
     *     @OA\Schema(type="string",example="mdi-apps")
     *   ),
     *   @OA\Parameter(
     *     name="module",
     *     in="query",
     *     required=true,
     *     description="The module property",
     *     @OA\Schema(type="string",example="accounting")
     *   ),
     *   @OA\Parameter(
     *     name="sorting_number",
     *     in="query",
     *     required=true,
     *     description="The sorting number property for apply costume sorting by user",
     *     @OA\Schema(type="integer",example="10")
     *   ),
     *   @OA\Parameter(
     *     name="description",
     *     in="query",
     *     required=true,
     *     description="The description property for user for meta too",
     *     @OA\Schema(type="string",example="This feature is awesome by default")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Page menu updated successfully"
     *        ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/PageMenu"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Http\Requests\UpdatePageMenuRequest $request
     * @param  \App\Models\PageMenu  $pageMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageMenuRequest $request, PageMenu $pageMenu)
    {
        $pageMenu->update($request->validated());
        return response()->json([
            "message" => "Page menu updated successfully",
            "data"    => $pageMenu,
        ]);
    }

    /**
     * @OA\Delete(
     *   tags={"PageMenu"},
     *   path="/api/v1/page-menus/{id}",
     *   security={{"sanctum ":{}}},
     *   summary="Remove the specified resource from page menu storage.",
     *   @OA\Parameter(
     *      name="id",
     *      description="id of page menu resource",
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
     *         example="Page menu deleted successfully"
     *       ),
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/PageMenu"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     *
     *
     * @param  \App\Models\PageMenu  $pageMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageMenu $pageMenu)
    {
        $pageMenu->delete();
        return response()->json([
            "message" => "Page menu deleted successfully",
            "data"    => $pageMenu,
        ]);
    }
}
