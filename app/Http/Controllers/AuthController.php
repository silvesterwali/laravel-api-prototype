<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *   tags={"Auth"},
     *   path="/api/v1/login",
     *   summary="Endpoint for user login and generate token for authentication",
     *   operationId="login",
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     required=true,
     *     description="email or username value",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Parameter(
     *     name="password",
     *     in="query",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="user",
     *          ref="#/components/schemas/User"
     *        ),
     *       @OA\Property(
     *          property="token",
     *          type="string",
     *          example="random token here"
     *        )
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function login(Request $request)
    {
        $request->validate(
            ['email' => 'string|required', 'password' => 'string|required']
        );

        $user = User::where('email', '=', $request->email)
            ->orWhere('username', '=', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            "user" => $user,
            "token" => $user->createToken('auth_token')->plainTextToken
        ]);
    }

    /**
     * @OA\Get(
     *   tags={"Auth"},
     *   path="/api/v1/me",
     *   security={{"sanctum ":{}}},
     *   summary="Get user login self information",
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(ref="#/components/schemas/User")
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * @OA\Post(
     *   tags={"Auth"},
     *   path="/api/v1/logout",
     *   security={{"sanctum ":{}}},
     *   summary="logout user authenticate",
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *          property="message",
     *          type="string",
     *          example="Logout success"
     *        ),
     *      )
     *    ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function logout(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $user->tokens()->delete();
        return response()->json([
            "message" => "Logout success"
        ]);
    }
}
