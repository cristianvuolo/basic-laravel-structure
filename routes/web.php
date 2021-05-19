<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('panel.dashboard.index');
Route::get('/painel/list', [ClientController::class, 'listClients'])->name('panel.client.list');
Route::get('/painel/client/new', [ClientController::class, 'newClientForm'])->name('panel.client.new');
Route::get('/painel/client/edit/{id}', [ClientController::class, 'editClientForm'])->name('panel.client.edit');
Route::get('/painel/client/delete/{id}', [ClientController::class, 'deleteClient'])->name('panel.client.delete');
Route::post('/painel/client/store', [ClientController::class, 'store'])->name('panel.client.store');
Route::post('/painel/client/update/{id}', [ClientController::class, 'update'])->name('panel.client.update');
