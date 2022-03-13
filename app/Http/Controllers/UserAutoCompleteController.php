<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAutoCompleteController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Users"},
     *   path="/api/v1/user-autocomplete?search=user",
     *   summary="Search user by username and and email. Will return result similar to query search parameters",
     *   @OA\Response(
     *     response=200,
     *      description="OK",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/User")
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $users = User::search($search)
                ->orderBy('username', 'asc')
                ->get();
            return response()->json($users);
        }
        return response()->json([]);
    }
}
