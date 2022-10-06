<?php
use Illuminate\Support\Facades\Route;

Route::get('welcome', [App\Http\Controllers\API\v1\WelcomeController::class, 'index']);
Route::post('addData', [App\Http\Controllers\API\v1\WelcomeController::class, 'addData'])->name('welcome.addData');

