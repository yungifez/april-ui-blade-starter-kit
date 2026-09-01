<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecurityController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('settings/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('settings/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('settings/appearance', 'pages.settings.appearance')->name('appearance.edit');

    Route::get('settings/security', [SecurityController::class, 'edit'])
        ->middleware('password.confirm')->name('security.edit');
    Route::put('settings/security/password', [SecurityController::class, 'updatePassword'])
        ->middleware('password.confirm')->name('security.password.update');
});
