<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::apiResource('posts', PostController::class)->only(['index', 'show']); 