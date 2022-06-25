<?php

use App\Http\Controllers\SafeController;
use Illuminate\Support\Facades\Route;



Route::get('check-image',[SafeController::class,'checkImageSafe']);
Route::get('check-video',[SafeController::class,'checkVideoSafe']);
