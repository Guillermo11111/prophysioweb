<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PythonController;


//blog
Route::get('blog', [BlogController::class, 'index'])->middleware('isGuest')->name('blog.all');

//agendar
Route::get('agendar', [AgendaController::class, 'index'])->middleware('isGuest')->name('agendar.cita');

//servicios 
Route::get('servicios', [ServiciosController::class, 'index'])->middleware('isGuest')->name('servicios.mostrar');


//contacto
Route::middleware('isGuest')->controller(ContactoController::class)->group(function(){
    Route::get('contacto', 'index')->name('contacto.formulario');
    Route::post('contacto-enviar', 'enviarCorreoContacto')->name('contacto.enviar');  
    Route::get('preguntas-frecuentes', 'pre_fre')->name('preguntas.frecuentes');
    Route::get('terminos-y-condiciones', 'ter_cond')->name('terminos.condiciones');
    Route::get('politica-de-privacidad', 'politica')->name('politica.privacidad');
});

//quienes somos? - nosotros
Route::middleware('isGuest')->controller(NosotrosController::class)->group(function(){
    Route::get('quienes-somos', 'index')->name('quienes.somos');
    Route::get('especialistas', 'index')->name('especialistas.mostrar');
});

//cuenta - visitante - vistas
Route::middleware('isGuest')->controller(VisitanteController::class)->group(function(){
    Route::get('login', 'login')->name('login.visit');
    Route::get('register', 'registro')->name('register.visit');
});


//registro, inicio de sesion
Route::post('validar-registro',[UserController::class, 'validar_register'])->middleware('isGuest')->name('validar.registro');
Route::post('inicia-sesion',[UserController::class, 'inicia_sesion'])->middleware(['isGuest','throttle:4,1'])->name('inicia.sesion');

//Recuperar contraseña pregunta secreta
Route::middleware('isGuest')->controller(PasswordResetController::class)->group(function(){
    Route::get('recuperar-contraseña','mostrarOpciones')->name('password.options');
    Route::get('pregunta-secreta','mostrarPregunta')->name('password.secret');
    Route::post('verificar-correo','validarCorreo')->name('password.email.validate');
    Route::get('escribir-respuesta/{email}','preguntar')->name('password.pregunta');

    Route::post('verificar-respuesta','validarRespuesta')->middleware('throttle:4,1')->name('password.respuesta.validate');
});

//Recuperar contraseña correo
Route::middleware('isGuest')->group(function(){
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password-email', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

//recuperar contraseña
//Route::get('recuperar-contraseña',[VisitanteController::class, 'recuperaContraseñaVista'])->middleware('isGuest')->name('recuperar.contraseña');

//Route::post('recuperar contraseña', [UserController::class, 'recuperarContraseña'])->middleware('isGuest')->name('user.recuperarContraseña');

Route::get('enviar-correo',[UserController::class, 'recuperaContraseñaVistaDos'])->middleware('isGuest')->name('recuperar.contraseñaEnviar');
?>