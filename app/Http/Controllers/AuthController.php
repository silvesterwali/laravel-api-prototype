<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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

        $request->validate(['email' => 'string|required', 'password' => 'string|required']);
        $user = User::where('email', $request->email)->orWhere('username', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        Auth::login($user, true);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 200);
    }

    /**
     * @OA\Get(
     *   tags={"Auth"},
     *   path="/api/v1/user",
     *   security={{"sanctum ":{}}},
     *   summary="Get user login self information",
     *   @OA\Response(response=200, description="OK",
     *      @OA\JsonContent(
     *        @OA\Property(
     *          property="user",
     *          type="object",
     *          ref="#/components/schemas/User")
     *        )
     *        
     *   ),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function user(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }
    /**
     * @OA\Post(
     *   tags={"Auth"},
     *   path="/api/v1/refresh",
     *   summary="Endpoint user will refresh their token",
     *   operationId="login",
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
    public function refresh(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken('refresh_token')->plainTextToken;
        $request->session()->regenerate();
        return response()->json(['token' => $token, 'user' => $user], 200);
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
        $user = User::find($request->user()->id);
        $user->tokens()->delete();
        Auth()->guard('web')->logout();
        return response()->json(["message" => "success logout"], 200);
    }
}
