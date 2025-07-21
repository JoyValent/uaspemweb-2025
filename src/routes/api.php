<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuController;

Route::apiResource('bukus', BukuController::class);
