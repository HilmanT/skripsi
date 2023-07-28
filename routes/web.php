<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPendaftaran;
use App\Http\Controllers\Admin\AdmiRekamMedisController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PendaftaranController;
use App\Http\Controllers\RekamMedisController;

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
    return view('welcome');
})->name('welcome');

Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');

Route::middleware(['auth', 'verified', 'pasien'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

    Route::get('/dashboard/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/dashboard/pendaftaran/create', [PendaftaranController::class, 'create'])->name('create.pendaftaran');
    Route::post('/dashboard/pendaftaran/store', [PendaftaranController::class, 'store'])->name('store.pendaftaran');
    Route::delete('/dashboard/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('delete.pendaftaran');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/dashboard/pendaftaran', [AdminPendaftaran::class, 'index'])->name('admin.pendaftaran');
    Route::get('/admin/dashboard/pendaftaran/create', [AdminPendaftaran::class, 'create'])->name('admin.create.pendaftaran');
    Route::post('/admin/dashboard/pendaftaran/store', [AdminPendaftaran::class, 'store'])->name('admin.store.pendaftaran');
    Route::delete('/admin/dashboard/pendaftaran/{id}', [AdminPendaftaran::class, 'destroy'])->name('admin.delete.pendaftaran');

    Route::get('/admin/dashboard/antrian', [AdmiRekamMedisController::class, 'index'])->name('admin.antrian');
    Route::get('/admin/dashboard/rekam-medis', [AdmiRekamMedisController::class, 'show'])->name('admin.rekam-medis');
    Route::get('/admin/dashboard/rekam-medis/{reg}', [AdmiRekamMedisController::class, 'create'])->name('admin.create.rekam-medis');
    Route::post('/admin/dashboard/rekam-medis/{reg}', [AdmiRekamMedisController::class, 'store'])->name('admin.store.rekam-medis');
});

Route::middleware(['auth', 'verified', 'dokter'])->group(function () {
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');

    Route::get('/dashboard/antrian', [RekamMedisController::class, 'index'])->name('antrian');
    Route::get('/dashboard/rekam-medis', [RekamMedisController::class, 'show'])->name('rekam-medis');
    Route::get('/dashboard/rekam-medis/{reg}', [RekamMedisController::class, 'create'])->name('create.rekam-medis');
    Route::post('/dashboard/rekam-medis/{reg}', [RekamMedisController::class, 'store'])->name('store.rekam-medis');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/rekam-medis/invoice/{id}', [RekamMedisController::class, 'invoice'])->name('invoice');
});

require __DIR__.'/auth.php';
