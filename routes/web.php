<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AirdropController;
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
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile');
    Route::post('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password');
    Route::post('/settings/users', [SettingsController::class, 'storeUser'])->name('settings.users.store');
    Route::put('/settings/users/{user}', [SettingsController::class, 'updateUser'])->name('settings.users.update');
    Route::delete('/settings/users/{user}', [SettingsController::class, 'deleteUser'])->name('settings.users.delete');
    
    // Airdrop Routes
    Route::get('/airdrop', [AirdropController::class, 'index'])->name('airdrop.index');
    Route::get('/airdrop/create', [AirdropController::class, 'create'])->name('airdrop.create');
    Route::post('/airdrop', [AirdropController::class, 'store'])->name('airdrop.store');
    Route::get('/airdrop/{id}', [AirdropController::class, 'show'])->name('airdrop.show');
    Route::get('/airdrop/{id}/edit', [AirdropController::class, 'edit'])->name('airdrop.edit');
    Route::put('/airdrop/{id}', [AirdropController::class, 'update'])->name('airdrop.update');
    Route::patch('/airdrop/{id}/status', [AirdropController::class, 'updateStatus'])->name('airdrop.updateStatus');
    Route::patch('/airdrop/{id}/notes', [AirdropController::class, 'updateNotes'])->name('airdrop.updateNotes');
    Route::post('/airdrop/{id}/completed', [AirdropController::class, 'markCompleted'])->name('airdrop.markCompleted');
    Route::delete('/airdrop/{id}', [AirdropController::class, 'destroy'])->name('airdrop.destroy');
    Route::post('/airdrop/{id}/daily-checklist', [AirdropController::class, 'toggleDailyChecklist'])->name('airdrop.toggleDailyChecklist');
    Route::post('/airdrop/{id}/claim', [AirdropController::class, 'claim'])->name('airdrop.claim');
});

require __DIR__.'/auth.php';
