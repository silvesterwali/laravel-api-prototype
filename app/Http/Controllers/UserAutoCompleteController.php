<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAutoCompleteController extends Controller
{
    /**
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
