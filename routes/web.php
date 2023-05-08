<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AgentDashboard;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ADMIN ROUTE START
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminDashboard::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminDashboard::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminDashboard::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminDashboard::class, 'AdminProfileUpdate'])->name('admin.profile.update');
});
Route::get('/admin/login', [AdminDashboard::class, 'AdminLogin'])->name('admin.login');
// ADMIN ROUTE END


// AGENT MIDDLEWARE GROUP START
Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentDashboard::class, 'AgentDashboard'])->name('agent.dashboard');
});
// AGENT MIDDLEWARE GROUP END
