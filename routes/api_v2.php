<?php
use Illuminate\Support\Facades\Route;

Route::get('welcome', [App\Http\Controllers\API\v2\WelcomeController::class, 'index']);
Route::post('addData', [App\Http\Controllers\API\v2\WelcomeController::class, 'addData'])->name('welcome.addData');
