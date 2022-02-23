<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeDepartmentController;
use App\Http\Controllers\EmployeeDivisionController;
use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\EmployeePositionController;
use App\Http\Controllers\EmployeeReligionController;
use App\Http\Controllers\PageMenuController;
use App\Http\Controllers\PageSubMenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserAutoCompleteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHasPageSubMenuController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "v1"], function () {
    Route::get('/', [WelcomeController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post("/give-permission", [PermissionController::class, 'give_permission']);
        Route::post("/revoke-permission", [PermissionController::class, 'revoke_permission']);
        Route::get("/permissions", [PermissionController::class, 'index']);
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);
        /**
         * TODO: all spatie permissions start with CRUD then followed by table name
         */
        Route::apiResources([
            "employee-departments" => EmployeeDepartmentController::class,
            "employee-divisions" => EmployeeDivisionController::class,
            "employee-levels" => EmployeeLevelController::class,
            "employee-positions" => EmployeePositionController::class,
            "employee-religions" => EmployeeReligionController::class,
            "page-menus" => PageMenuController::class,
            "page-sub-menus" => PageSubMenuController::class,

        ]);

        Route::apiResource("user-has-page-sub-menus", UserHasPageSubMenuController::class)->only('store', 'destroy');
        Route::get("/user-has-page-sub-menus/{user}", [UserHasPageSubMenuController::class, "show"]);
        Route::get("user-autocompleted", UserAutoCompleteController::class);
    });
});
