<?php

namespace App\Http\Controllers;

use App\Models\Apps\HrmEmployee;

class WelcomeController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Welcome"},
     *   path="/api/",
     *   summary="Welcome index",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *        )
     *     )
     *   )
     * )
     */
    public function index()
    {
        return response()->json(HrmEmployee::paginate());
    }
}
