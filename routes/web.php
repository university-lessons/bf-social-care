<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/subjects', [SubjectsController::class, 'index'])->name('admin.subjects.index');

    Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('admin.subjects.create');
    Route::post('/subjects', [SubjectsController::class, 'store'])->name('admin.subjects.store');

    Route::get('/subjects/{id}', [SubjectsController::class, 'detail'])->name('admin.subjects.detail');

    Route::get('/subjects/{id}/edit', [SubjectsController::class, 'edit'])->name('admin.subjects.edit');
    Route::post('/subjects/{id}', [SubjectsController::class, 'update'])->name('admin.subjects.update');

    Route::get('/subjects/{id}/attendances', [AttendanceController::class, 'create'])->name('admin.attendances.create');
    Route::post('/subjects/{id}/attendances', [AttendanceController::class, 'store'])->name('admin.attendances.store');

    Route::get('/subjects/{id}/attendances/{attendanceId}', [AttendanceController::class, 'detail'])->name('admin.attendances.detail');

    Route::post('/attendances/{attendanceId}/setforwarding', [AttendanceController::class, 'setForwarding'])->name('admin.attendances.setforwarding');
});
