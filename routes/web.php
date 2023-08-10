<?php

use App\Http\Controllers\AnswerController;
use App\Models\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AplicationController;
use Illuminate\Contracts\Foundation\MaintenanceMode;


Route::group(['middleware'=>'auth'] ,function () {

    Route::get('/', [MainController::class, 'main'])-> name('main');

    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('applications/{application}/answer', [AnswerController::class, 'create'])->name('answers.create')->middleware('role:manager');
    Route::post('applications/{application}/answer', [AnswerController::class, 'store'])->name('answers.store');

    Route::resource('applications', AplicationController::class);
});

require __DIR__.'/auth.php';
