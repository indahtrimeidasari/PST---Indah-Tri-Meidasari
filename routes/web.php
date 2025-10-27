<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_Profile;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

// Umum
use App\Http\Controllers\C_Home;

// Admin / Master Data
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Dashboard1;
use App\Http\Controllers\C_Pesan;
use App\Http\Controllers\C_Dokumen;
use App\Http\Controllers\C_Artikel;
use App\Http\Controllers\C_TentangKami;




//
// =====================
// Public Pages
// =====================
Route::get('/', [C_Home::class, 'index'])->name('index');

//
// =====================
// Dashboard Pages
// =====================
Route::view('/admin', 'admin.v_dashboard')->name('admin');
Route::view('/dashboard', 'v_dashboard')->name('dashboard');


//
// =====================
// AUTH: LOGIN / REGISTER / RESET PASSWORD
// =====================

// ✅ LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [C_Login::class, 'index'])->name('login');
    Route::post('/login', [C_Login::class, 'login'])->name('login.post');

    // ✅ REGISTER
    Route::get('/register', [C_Register::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [C_Register::class, 'register'])->name('register.submit');

    // ✅ FORGOT PASSWORD
    Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

    // ✅ RESET PASSWORD
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

// ✅ LOGOUT
Route::post('/logout', [C_Login::class, 'logout'])->name('logout')->middleware('auth');


//
// =====================
// PROFILE
// =====================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [C_Profile::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [C_Profile::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [C_Profile::class, 'update'])->name('profile.update');
});


// Dashboard
// =====================
Route::get('/admin', [C_Dashboard::class, 'index']);
Route::get('/dashboard1', [C_Dashboard1::class, 'index']);


//
// =====================
// Pesan / Hubungi Kami
// =====================
Route::post('/hubungi-kami/simpan', [C_Pesan::class, 'simpan']);
Route::get('/pesan-masuk', [C_Pesan::class, 'index']);
Route::get('/hubungi-kami', function () {
    return view('hubungi');
});
Route::delete('/pesan-masuk/{id}/hapus', [C_Pesan::class, 'hapus']);
Route::delete('/pesan/hapus/{id}', [C_Pesan::class, 'hapus']);


Route::get('/login', [C_Login::class, 'index'])->name('login');
Route::post('/login', [C_Login::class, 'login']);
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');



// Dashboard utama (aman dan benar)
Route::get('/dashboard', function () {
    return view('v_dashboard');
})->middleware('auth')->name('dashboard');


// 🔒 Semua fitur CRUD & download hanya untuk user login
Route::middleware(['auth'])->group(function () {
    Route::get('/dokumen', [C_Dokumen::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [C_Dokumen::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [C_Dokumen::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{dokumen}/edit', [C_Dokumen::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{dokumen}', [C_Dokumen::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{dokumen}', [C_Dokumen::class, 'destroy'])->name('dokumen.destroy');

    // Download dokumen 
    Route::get('/dokumen/download/{id}', [C_Dokumen::class, 'download'])->name('dokumen.download');
});

// Halaman publik 
Route::get('/koleksi-dokumen', [C_Dokumen::class, 'showPublic'])->name('dokumen.public');


// Artikel
Route::get('/artikel', [C_Artikel::class, 'index'])->name('artikel.index');
Route::get('/artikel/create', [C_Artikel::class, 'create'])->name('artikel.create');
Route::post('/artikel/store', [C_Artikel::class, 'store'])->name('artikel.store');
Route::delete('/artikel/{id}', [C_Artikel::class, 'destroy'])->name('artikel.destroy');
Route::get('/artikel/{id}', [C_Artikel::class, 'show'])->name('artikel.show');
Route::get('/artikel/{id}/edit', [C_Artikel::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [C_Artikel::class, 'update'])->name('artikel.update');

// Kelola Tentang Kami
Route::get('/tentang', [C_TentangKami::class, 'index'])->name('tentang.index');
Route::get('/tentangkami/tambah', [C_TentangKami::class, 'create'])->name('tentang.create');
Route::post('/tentangkami/store', [C_TentangKami::class, 'store'])->name('tentang.store');
Route::get('/tentangkami/edit/{id}', [C_TentangKami::class, 'edit'])->name('tentang.edit');
Route::put('/tentangkami/update/{id}', [C_TentangKami::class, 'update'])->name('tentang.update');
Route::delete('/tentangkami/destroy/{id}', [C_TentangKami::class, 'destroy'])->name('tentang.destroy');