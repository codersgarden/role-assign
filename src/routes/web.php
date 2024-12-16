<?php

use Codersgarden\RoleAssign\Controller\RoleController;
use Illuminate\Support\Facades\Route;


Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/permissions/{id}', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
});  