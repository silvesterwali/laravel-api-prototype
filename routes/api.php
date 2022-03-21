<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeBankController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDepartmentController;
use App\Http\Controllers\EmployeeDivisionController;
use App\Http\Controllers\EmployeeEducationController;
use App\Http\Controllers\EmployeeInsuranceController;
use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\EmployeePositionController;
use App\Http\Controllers\EmployeeReligionController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PageMenuController;
use App\Http\Controllers\PageMenuManagementOfUserController;
use App\Http\Controllers\PageSubMenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserAndPermissionController;
use App\Http\Controllers\UserAutoCompleteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHasPageSubMenuController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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
        Route::apiResources([
            "employees"            => EmployeeController::class,
            "employee-departments" => EmployeeDepartmentController::class,
            "employee-divisions"   => EmployeeDivisionController::class,
            "employee-levels"      => EmployeeLevelController::class,
            "employee-positions"   => EmployeePositionController::class,
            "employee-religions"   => EmployeeReligionController::class,
            "employee-education"   => EmployeeEducationController::class,
            "page-menus"           => PageMenuController::class,
            "page-sub-menus"       => PageSubMenuController::class,
            "offices"              => OfficeController::class,
            "employee-banks"       => EmployeeBankController::class,
            "employee_insurances"  => EmployeeInsuranceController::class,
            "families"             => FamilyController::class,
        ]);

        Route::apiResource("user-has-page-sub-menus", UserHasPageSubMenuController::class)->only('store', 'destroy');
        Route::get("/user-has-page-sub-menus/{user}", [UserHasPageSubMenuController::class, "show"]);
        Route::get("/user-autocompleted", UserAutoCompleteController::class);
        Route::get('/page-menu-management-of-user/{user}', [PageMenuManagementOfUserController::class, 'index']);
        Route::delete('/page-menu-management-of-user/page-sub-menu/{page_sub_menu}/user/{user}', [PageMenuManagementOfUserController::class, 'destroy']);
        Route::get("/user-and-permission/{user}", [UserAndPermissionController::class, 'index']);
        Route::post("/user-and-permission/give-permission", [UserAndPermissionController::class, 'give_permission']);
        Route::post("/user-and-permission/revoke-permission", [UserAndPermissionController::class, 'revoke_permission']);
    });
});
