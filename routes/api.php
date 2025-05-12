<?php

use App\Http\Controllers\GameHistoryController;
use App\Http\Controllers\GameLobbyHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::resource('game-histories', GameHistoryController::class);