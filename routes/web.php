<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestPageController;
use App\Http\Controllers\Pages\UserManageController;
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
    return redirect()->route('guest-page.index');
});

Route::get('/home/artikel', [GuestPageController::class, 'Article'])->name('guest-page.article');
Route::get('/home/struktur-organisasi', [GuestPageController::class, 'index'])->name('guest-page.index');
Route::get('/home/profile-dosen', [HomeController::class, 'ListUsers'])->name('profile-dosen.index');
route::get('/home/profile-dosen/show/{id}', [HomeController::class, 'DetailUser'])->name('profile-dosen.show');

Route::middleware('auth')->group(function () {
    Route::get('/home/profile', [HomeController::class, 'index'])->name('home.index');
    Route::post('/home/update-user', [HomeController::class, 'updateUser'])->name('home.update-user');

    route::get('/admin/usermanage', [UserManageController::class, 'index'])->name('usermanage.index');
    route::get('/admin/usermanage/create', [UserManageController::class, 'create'])->name('usermanage.create');
    route::post('/admin/usermanage/store', [UserManageController::class, 'store'])->name('usermanage.store');
    route::delete('/admin/usermanage/delete/{id}', [UserManageController::class, 'destroy'])->name('usermanage.destroy');
    route::get('/admin/usermanage/edit/{id}', [UserManageController::class, 'edit'])->name('usermanage.edit');
    route::get('/admin/usermanage/show/{id}', [UserManageController::class, 'show'])->name('usermanage.show');
    route::patch('/admin/usermanage/update/{id}', [UserManageController::class, 'update'])->name('usermanage.update');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
