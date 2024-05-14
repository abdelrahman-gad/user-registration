<?php

use App\Http\Controllers\Api\Site\ProductController;
use App\Http\Controllers\Api\Site\AuthController;
use App\Http\Controllers\Api\Site\UserProfileController;
use Illuminate\Support\Facades\Route;


        Route::post('login',[AuthController::class,'login']);
        Route::post('register',[AuthController::class,'register']);

        Route::middleware(['auth:sanctum','abilities:user'])->group(function(){

            Route::get('logout',[AuthController::class,'logout']);
            Route::get('profile',[UserProfileController::class,'show']);
            Route::post('change-password',[UserProfileController::class,'changePassword']);
        
        });


