<?php

use App\Http\Controllers\DagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapPrintController;
use App\Http\Controllers\MouzaController;
use App\Http\Controllers\MouzanewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //UserController
    Route::resource('users', UserController::class);

    //RoleController
    Route::get('roles/{id}/edit-permission', [RoleController::class, 'edit_permission'])->name('roles.edit_permission');
    Route::post('roles/{id}/update-permission', [RoleController::class, 'update_permission'])->name('roles.update_permission');
    Route::resource('roles', RoleController::class);

    // SettingsController
    Route::get('general-settings', [SettingsController::class, 'general_settings_edit'])->name('general_settings.edit');
    Route::put('general-settings', [SettingsController::class, 'general_settings_update'])->name('general_settings.update');

    Route::get('system-settings', [SettingsController::class, 'system_settings_edit'])->name('system_settings.edit');
    Route::put('system-settings', [SettingsController::class, 'system_settings_update'])->name('system_settings.update');


    //LocationController
    Route::resource('locations', LocationController::class);

    //MouzaController
    Route::resource('mouzas', MouzaController::class);
    Route::post('get-mouza', [MouzaController::class, 'get_mouza'])->name('get_mouza');
    Route::post('get-mouza-new', [MouzaController::class, 'get_newmouza'])->name('get_newmouza');


    //MouzaController
    Route::resource('mouzasnew', MouzanewController::class);



    //DagController
    Route::resource('dags', DagController::class);

    //MapPrintController
    Route::get('map-search', [MapPrintController::class, 'map_search'])->name('map_search');
    Route::get('map-print/{map}/show', [MapPrintController::class, 'map_print_show'])->name('map_print_show');
    Route::get('map-print/{map}/print', [MapPrintController::class, 'print_map'])->name('print_map');
    Route::post('map-print/send', [MapPrintController::class, 'send_map'])->name('send_map');

    //ReportControler
    Route::get('report', [ReportController::class, 'index'])->name('report.basic');
});

require __DIR__ . '/auth.php';
