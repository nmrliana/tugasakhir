<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminKaryawanController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminMenuKategoriController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminStokController;
use App\Http\Controllers\Admin\AdminWebsiteController;

use App\Http\Controllers\Kasir\KasirController;

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


Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout');
    Route::post('login', 'loginProses');
});

Route::middleware('auth')->group(function () {

    // ADMIN PREFIX
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('beranda', 'beranda');
            Route::post('modal-awal', 'modalAwal');
        });

        // star master prefix
        Route::prefix('master-data')->group(function () {
            Route::controller(AdminKaryawanController::class)->group(function () {
                Route::get('data-karyawan', 'index');
                Route::get('data-karyawan/create', 'create');
                Route::post('data-karyawan/create', 'store');
                Route::get('data-karyawan/{karyawan}/show', 'show');
                Route::get('data-karyawan/{karyawan}/edit', 'edit');
                Route::put('data-karyawan/{karyawan}/edit', 'update');
                Route::get('data-karyawan/{karyawan}/delete', 'destroy');
            });

            Route::controller(AdminMenuController::class)->group(function () {
                Route::get('data-menu', 'index');
                Route::get('data-menu/create', 'create');
                Route::post('data-menu/create', 'store');
                Route::get('data-menu/{menu}/edit', 'edit');
                Route::get('data-menu/{menu}/show', 'show');
                Route::put('data-menu/{menu}/update', 'update');
                Route::post('data-menu/{menu}/update-status', 'updateStatus');
                Route::put('data-menu/{menu}/edit', 'update');
                Route::get('data-menu/{menu}/delete', 'destroy');
            });

            Route::controller(AdminMenuKategoriController::class)->group(function () {
                Route::get('data-kategori', 'index');
                Route::post('data-kategori/create', 'store');
                Route::put('data-kategori/{kategori}/edit', 'update');
                Route::get('data-kategori/{kategori}/delete', 'destroy');
            });
        });

        // end master prefix

        Route::controller(AdminStokController::class)->group(function () {
            Route::get('data-stok', 'index');
        });

        Route::prefix('website')->group(function () {
            Route::controller(AdminWebsiteController::class)->group(function () {
                Route::get('galeri-pengunjung', 'galeri');
                Route::get('galeri-pengunjung/{galeri}/delete', 'galeriDestroy');
                Route::post('galeri-pengunjung', 'galeriStore');

                Route::get('galeri-slide', 'slide');
                Route::get('galeri-slide/{slide}/delete', 'slideDestroy');
                Route::post('galeri-slide', 'slideStore');

                Route::get('toko', 'toko');
                Route::put('toko/{toko}/update', 'updateToko');
            });
        });

        Route::controller(AdminLaporanController::class)->group(function () {
            Route::get('laporan/{tahun}', 'index');
        });


        Route::controller(AdminProfilController::class)->group(function () {
            Route::get('profil', 'index');
            Route::get('profil/{karyawan}/edit', 'edit');
            Route::put('profil/{karyawan}/edit', 'update');
        });
    });
    // END ADMIN PREFIX


    Route::prefix('kasir')->group(function () {

        Route::controller(KasirController::class)->group(function () {
            Route::get('beranda', 'beranda');
            Route::get('reset-pesanan', 'resetPesanan');
            Route::get('tambah/{menu}', 'tambah');
            Route::post('proses', 'prosesPesanan');
            Route::get('cetak/{pesanan}', 'cetak');
            Route::get('hapus/{pesanan}', 'deleteMenu');
            Route::get('history', 'history');
        });
    });
});
