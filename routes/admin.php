<?php

use App\Http\Controllers\BackupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InfoEmpresaController;



Route::get('admin', [AdminController::class, 'index'])->middleware('isGuest')
    ->name('admin.login');

Route::post('login_admin', [AdminController::class, 'login'])->middleware('throttle:3,1')
    ->name('admin.login.form');

Route::get('admin/dashboard', [AdminController::class, 'inicio'])
    ->middleware(['auth','isAdmin'])
    ->name('admin.dashboard');

Route::get('admin_logout', [AdminController::class, 'logout'])
    ->middleware(['auth','isAdmin'])
    ->name('admin.logout');

Route::prefix('admin/db')->middleware(['auth','isAdmin'])->name('admin.db.')->controller(BackupController::class)->group(function () {
    Route::get('/respaldos', 'index')->name('backup');
    Route::get('/restauracion', 'restore')->name('restore');
});

Route::get('respaldos-completos',[BackupController::class, 'respaldoCompleto'])->middleware(['auth','isAdmin'])->name('admin.db.backup.completo');
Route::post('respaldos-tabla',[BackupController::class, 'respaldarTabla'])->middleware(['auth','isAdmin'])->name('admin.db.backup.tabla');
Route::post('restaurar-bd',[BackupController::class, 'restaurar'])->middleware(['auth','isAdmin'])->name('admin.db.restore.completo');


Route::prefix('admin/blog')->middleware(['auth','isAdmin'])->name('admin.blog.')->controller(BlogController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/crear','admin_create')->name('create');
    Route::get('/eliminar','admin_delete')->name('delete');
    Route::get('/editar','admin_edit')->name('edit');
});

Route::prefix('admin/servicios')->middleware(['auth','isAdmin'])->name('admin.servicios.')->controller(ServiciosController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/crear','create')->name('create');
    Route::get('/eliminar','delete')->name('delete');
    Route::get('/editar','edit')->name('edit');

    Route::post('/store','store')->name('store');
});

Route::prefix('admin/especialidades')->middleware(['auth','isAdmin'])->name('admin.especialidades.')->controller(EspecialidadesController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/crear','create')->name('create');
    Route::get('/eliminar','delete')->name('delete');
    Route::get('/editar','edit')->name('edit');

    Route::post('/store','store')->name('store');
});


Route::prefix('admin/empresa')->middleware(['auth','isAdmin'])->name('admin.empresa.')->controller(InfoEmpresaController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/eliminar','delete')->name('delete');
    Route::get('/actualizar','edit')->name('edit');

    Route::post('/store','store')->name('store');
});

?>