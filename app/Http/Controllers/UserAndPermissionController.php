<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class UserAndPermissionController extends Controller
{
    public function index(Request $request, User $user)
    {
        $search = $request->query('search');
        $per_page = $request->query('per_page') ?? 15;
        $query = Permission::query();
        $query->with('users', function ($query) use ($user) {
            $query->where('id', $user->id)->select('id', 'username', 'email');
        });

        $query->when($search, function ($query) use ($search) {
            $query->where('name', 'ilike', "%{$search}%")
                ->orWhere('module', 'ilike', "%{$search}%")
                ->orWhere('description', 'ilike', "%{$search}%");
        });

        $query->orderBy('name', 'asc');
        $permissions = $query->paginate($per_page);
        return response()->json($permissions);
    }


    public function give_permission_to_user(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->givePermissionTo(Permission::find($request->permission_id));

        return response()->json([
            "message" => "Permission granted to user successfully"
        ]);
    }

    public function remove_permission_from_user(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->revokePermissionTo(Permission::find($request->permission_id)->name);
        return response()->json([
            "message" => "Permission revoke from user successfully"
        ]);
    }
}
