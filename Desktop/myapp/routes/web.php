<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account/inactive', function () {
    $status = session('status', 'inactive');
    return view('account-inactive', ['status' => $status]);
})->name('account.inactive');

Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('check.account.status');

// --- Тестовые маршруты (удалить в продакшене) ---
Route::get('/test-login/{id}', function (int $id) {
    $user = \App\Models\User::find($id);
    if (!$user) {
        return "User #{$id} not found. Run: php artisan tinker -> User::factory()->create()";
    }
    Auth::login($user);
    return redirect('/profile')->with('success', "Logged in as {$user->email} (status: {$user->account_status})");
});

Route::get('/test-logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Logged out');
});