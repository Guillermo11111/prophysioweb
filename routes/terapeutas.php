<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\TerapeutaController;


Route::get('terapeuta_logout', [TerapeutaController::class, 'logout'])
    ->middleware(['auth','isTerapeuta'])
    ->name('terapeuta.logout');

Route::prefix('terapeuta/')->middleware(['auth','isTerapeuta'])->name('terapeuta.')->controller(TerapeutaController::class)->group(function () {
    Route::get('cuenta', 'cuenta')->name('cuenta');

    Route::get('dashboard', 'index')->name('dashboard');

    Route::get('agenda', 'agenda')->name('agenda');

    Route::get('buscar', 'buscar')->name('buscar.cita');

    Route::get('alexa-configuracion', 'configurar')->name('configurar.alexa');

    Route::get('alexa-generar', 'generarToken')->name('generar.alexa');
    
});

Route::prefix('terapeuta/pacientes')->middleware(['auth','isTerapeuta'])->name('terapeuta.pacientes.')->controller(PacientesController::class)->group(function () {
    Route::get('/','index')->name('show');
    Route::get('/registrar','create')->name('create');
    Route::get('/eliminar','delete')->name('delete');
    Route::get('/editar','edit')->name('edit');

    Route::post('/store','store')->name('store');
    Route::get('/exportar','exportar')->name('exportar');
});
?>