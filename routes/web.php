<?php

use App\Http\Controllers\dashboard\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/FinalProject')->name('Final.')->group(function(){
    Route::prefix('/Dashboard')->name('dashboard')->controller(IndexController::class)->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/index2', 'index2')->name('index2');
    });

});
