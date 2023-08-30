<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestPageController;
use App\Http\Controllers\Pages\UserManageController;
use App\Http\Controllers\Pages\WebSettingController;
use App\Http\Controllers\Pages\User\PositionController;
use App\Http\Controllers\Pages\User\OvertimesController;
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

Route::get('/home/artikel', [GuestPageController::class, 'index'])->name('guest-page.index');

Route::middleware('auth')->group(function () {
    Route::get('/home/dashboard', [HomeController::class, 'dashboard'])->name('home.dashboard');
    Route::get('/home/profile', [HomeController::class, 'index'])->name('home.index');
    Route::post('/home/update-user', [HomeController::class, 'updateUser'])->name('home.update-user');
    route::post('/home/status/store', [GuestPageController::class, 'saveStatus'])->name('status.store');
    route::delete('/home/status/delete/{id}', [GuestPageController::class, 'destroy'])->name('status.destroy');

    // USER MANAGEMENT ROUTES
    route::get('/admin/usermanage', [UserManageController::class, 'index'])->name('usermanage.index');
    route::get('/admin/usermanage/create', [UserManageController::class, 'create'])->name('usermanage.create');
    route::post('/admin/usermanage/store', [UserManageController::class, 'store'])->name('usermanage.store');
    route::delete('/admin/usermanage/delete/{id}', [UserManageController::class, 'destroy'])->name('usermanage.destroy');
    route::get('/admin/usermanage/edit/{id}', [UserManageController::class, 'edit'])->name('usermanage.edit');
    route::get('/admin/usermanage/show/{id}', [UserManageController::class, 'show'])->name('usermanage.show');
    route::patch('/admin/usermanage/update/{id}', [UserManageController::class, 'update'])->name('usermanage.update');
    // DATABASE BACKUP RESTORE SETUP
    Route::get('/admin/web/backup-db', function () {
        // Jalankan perintah artisan untuk membuat backup
        Artisan::call('backup:run');
        // Dapatkan nama file zip terakhir yang dibuat
        $latestBackup = collect(Storage::disk('local')->files('laravel-backup'))->last();
        // Unduh file zip tersebut tanpa mengirim email
        return Storage::disk('local')->download($latestBackup, null, ['X-Vapor-Base64-Encode' => 'True']);
    })->name('web.download-db');
    // WEB MANAGEMENT ROUTES
    route::get('/admin/web', [WebSettingController::class, 'index'])->name('web.index');
    route::get('/admin/web/create', [WebSettingController::class, 'create'])->name('web.create');
    route::post('/admin/web/store', [WebSettingController::class, 'store'])->name('web.store');
    route::delete('/admin/web/delete/{id}', [WebSettingController::class, 'destroy'])->name('web.destroy');
    route::get('/admin/web/edit/{id}', [WebSettingController::class, 'edit'])->name('web.edit');
    route::get('/admin/web/show/{id}', [WebSettingController::class, 'show'])->name('web.show');
    route::patch('/admin/web/update/{id}', [WebSettingController::class, 'update'])->name('web.update');
    // POSITION MANAGEMENT ROUTES
    route::get('/admin/position', [PositionController::class, 'index'])->name('position.index');
    route::get('/admin/position/create', [PositionController::class, 'create'])->name('position.create');
    route::post('/admin/position/store', [PositionController::class, 'store'])->name('position.store');
    route::delete('/admin/position/delete/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
    route::get('/admin/position/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
    route::get('/admin/position/show/{id}', [PositionController::class, 'show'])->name('position.show');
    route::patch('/admin/position/update/{id}', [PositionController::class, 'update'])->name('position.update');
    // OVERTIMES MANAGEMENT ROUTES
    route::get('/admin/overtimes', [OvertimesController::class, 'index'])->name('overtimes.index');
    route::get('/admin/overtimes/create', [OvertimesController::class, 'create'])->name('overtimes.create');
    route::post('/admin/overtimes/store', [OvertimesController::class, 'store'])->name('overtimes.store');
    route::delete('/admin/overtimes/delete/{id}', [OvertimesController::class, 'destroy'])->name('overtimes.destroy');
    route::get('/admin/overtimes/edit/{id}', [OvertimesController::class, 'edit'])->name('overtimes.edit');
    route::get('/admin/overtimes/show/{id}', [OvertimesController::class, 'show'])->name('overtimes.show');
    route::patch('/admin/overtimes/update/{id}', [OvertimesController::class, 'update'])->name('overtimes.update');
});

require __DIR__.'/auth.php';
