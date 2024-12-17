<?php

use Codersgarden\RoleAssign\Controller\PermissionGroupsController;
use Codersgarden\RoleAssign\Controller\PermissionsController;
use Codersgarden\RoleAssign\Controller\RoleController;
use Codersgarden\RoleAssign\Controller\IndexController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkpermission'])->prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/permissions/{id}', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
});  




Route::middleware(['auth', 'checkpermission'])->prefix('/permission-groups')->group(function () {
    Route::get('/', [PermissionGroupsController::class, 'index'])->name('permission-groups.index');
    Route::get("/create", [PermissionGroupsController::class,  "create"])->name("permission-groups.create");
    Route::get("/edit/{ulid}", [PermissionGroupsController::class,  "edit"])->name("permission-groups.edit");
    Route::delete("/destroy/{ulid}", [PermissionGroupsController::class,  "destroy"])->name("permission-groups.destroy");
    Route::post("/store", [PermissionGroupsController::class,  "store"])->name("permission-groups.store");
    Route::post("/update/{ulid}", [PermissionGroupsController::class,  "update"])->name("permission-groups.update");
});
// -----------------------Permission Group Routes End----------------------- 


// -----------------------Permissions Routes Start----------------------- 
Route::middleware(['auth', 'checkpermission'])->prefix('/permissions')->group(function () {
    Route::get('/', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::get("/create", [PermissionsController::class,  "create"])->name("permissions.create");
    Route::get("/edit/{id}", [PermissionsController::class,  "edit"])->name("permissions.edit");
    Route::delete("/destroy/{id}", [PermissionsController::class,  "destroy"])->name("permissions.destroy");
    Route::post("/store", [PermissionsController::class,  "store"])->name("permissions.store");
    Route::post("/update/{id}", [PermissionsController::class,  "update"])->name("permissions.update");
});
// -----------------------Permissions Routes End-----------------------

// -----------------------Assigning Permissions and Removing Permissions Routes-API Start-----------------------
Route::middleware(['auth'])->prefix('/api')->group(function () {
    Route::post('/permissions/assign-or-remove', [IndexController::class, 'assignOrRemovePermissions'])->name('api.permissions.assign-or-remove');
});