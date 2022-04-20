<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Bejegyzesek;
use App\Http\Controllers\Tevekenysegek;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::apiResource('/bejegyzesek', Bejegyzesek::class);
Route::put('/bejegyzesek/{id}', [Bejegyzesek::class, 'update']);
Route::post('bejegyzesek', [Bejegyzesek::class, 'store']);
Route::delete('/bejegyzesek/{id}', [Bejegyzesek::class, 'destroy']);



Route::apiResource('/tevekenyseg', Tevekenysegek::class);
Route::put('/tevekenyseg/{id}', [Tevekenysegek::class, 'update']);
Route::post('tevekenyseg', [Tevekenysegek::class, 'store']);
Route::delete('/tevekenyseg/{id}', [Tevekenysegek::class, 'destroy']);
