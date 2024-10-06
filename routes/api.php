<?php

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AchatController;
use App\Http\Controllers\Api\V1\CategorieController;
use App\Http\Controllers\Api\V1\CompteController;
use App\Http\Controllers\Api\V1\EnvieController;
use App\Http\Controllers\Api\V1\RentreController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function(){
    Route::resource('/achats', AchatController::class)->except(['edit','create']);
    Route::resource('/categories', CategorieController::class)->except(['edit','create']);
    Route::resource('/comptes', CompteController::class)->except(['edit','create']);
    Route::resource('/envies', EnvieController::class)->except(['edit','create']);
    Route::resource('/rentres', RentreController::class)->except(['edit','create']);

    Route::get('/comptes/{compte}/data',[CompteController::class,"dataCompte"]);
});