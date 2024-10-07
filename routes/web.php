<?php

use App\Http\Controllers\DataSetController;
use App\Http\Controllers\DataTrainingController;
use App\Http\Controllers\KNNController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',fn()=>redirect()->route('dataset'));

    Route::get('/dataset/create',[DataSetController::class,'create']);
    Route::get('/dataset', [DataSetController::class,'index'])->name('dataset');
    Route::post('/dataset/store',[DataSetController::class,'store']);
    Route::delete('/dataset/destroy',[DataSetController::class,'destroy']);


    Route::get('/datatraining',[DataTrainingController::class,'index'])->name('datatraining.index');
    Route::get('/datatraining/create',[DataTrainingController::class,'create']);
    Route::delete('/datatraining/destroy',[DataTrainingController::class,'destroy']);
    Route::post('/datatraining/store',[DataTrainingController::class,'store']);