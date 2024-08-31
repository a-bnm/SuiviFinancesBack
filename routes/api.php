<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AchatController;
use App\Http\Controllers\Api\V1\CategorieController;
use App\Http\Controllers\Api\V1\CompteController;
use App\Http\Controllers\Api\V1\EnvieController;
use App\Http\Controllers\Api\V1\RentreController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){
    Route::resource('/achats', AchatController::class)->except(['edit','create']);
    Route::resource('/categories', CategorieController::class)->except(['edit','create']);
    Route::resource('/comptes', CompteController::class)->except(['edit','create']);
    Route::resource('/envies', EnvieController::class)->except(['edit','create']);
    Route::resource('/rentres', RentreController::class)->except(['edit','create']);
});