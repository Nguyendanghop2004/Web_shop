<?php

use App\Http\Controllers\admins\CatelogueController;
use App\Http\Controllers\admins\ProductController;
use App\Http\Controllers\admins\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin/dashboard');
        });
        Route::prefix('catelogue')
            ->as('catelogue.')
            ->group(function () {
                Route::get('index', [CatelogueController::class, 'index'])->name('index');
                Route::get('create', [CatelogueController::class, 'create'])->name('create');
                Route::post('store', [CatelogueController::class, 'store'])->name('store');
                Route::get('show/{id}', [CatelogueController::class, 'show'])->name('show');
                Route::get('{id}/edit', [CatelogueController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [CatelogueController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [CatelogueController::class, 'destroy'])->name('destroy');
            });
        Route::prefix('product')
            ->as('product.')
            ->group(function () {
                Route::get('index', [ProductController::class, 'index'])->name('index');
                Route::get('create', [ProductController::class, 'create'])->name('create');
                Route::post('store', [ProductController::class, 'store'])->name('store');
                Route::get('show/{id}', [ProductController::class, 'show'])->name('show');
                Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('user')
            ->as('user.')
            ->group(function () {
                Route::get('index', [UserController::class, 'index'])->name('index');
                Route::get('create', [UserController::class, 'create'])->name('create');
                Route::post('store', [UserController::class, 'store'])->name('store');
                Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [UserController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [UserController::class, 'destroy'])->name('destroy');
            });
        Route::prefix('dustbin')
            ->as('dustbin.')
            ->group(function () {
                Route::get('/listDustbin', [UserController::class, 'listDustbin'])->name('listDustbin');
                Route::get('/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('forceDelete');
                Route::get('/restore/{id}', [UserController::class, 'restore'])->name('restore');;
            });
    });
