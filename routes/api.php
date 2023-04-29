<?php

use App\Http\Controllers\EnseignantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/enseignants",[EnseignantController::class,'index'])->name('enseignants.index');
Route::post("/enseignants",[EnseignantController::class,'store'])->name('enseignants.store');
Route::get("/enseignants/show/{id}",[EnseignantController::class,'show'])->name('enseignants.show');
Route::put("/enseignants/update/{id}",[EnseignantController::class,'update'])->name('enseignants.update');
Route::delete("/enseignants/delete/{id}",[EnseignantController::class,'destroy'])->name('enseignants.delete');
Route::get("/enseignants/total",[EnseignantController::class,'prestation_totale'])->name('enseignants.prestation.totale');
