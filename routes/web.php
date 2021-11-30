<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lists\StageController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\EmployeController;
use App\Http\Controllers\Lists\EncadreurController;
use App\Http\Controllers\Lists\SpecialiteController;
use App\Http\Controllers\Lists\UniversiteController;
use App\Http\Controllers\Backend\StagiaireController;
use App\Http\Controllers\Lists\DepartementController;
use App\Http\Controllers\Backend\ResponsableController;

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
Route::get('', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('responsable/dashboard', [ResponsableController::class, 'dashboard'])->name('responsable.dashboard');
Route::get('responsabel/statistics', [ResponsableController::class, 'statistics'])->name('responsable.statistics');
Route::get('responsable/{responsable}/edit/edit_password', [ResponsableController::class, 'editPassword'])->name('responsable.edit.password');
Route::put('responsable/{responsable}/edit/edit_password', [ResponsableController::class, 'change_password'])->name('responsable.change.password');

Route::get('employe/dashboard', [EmployeController::class, 'dashboard'])->name('employe.dashboard');
Route::get('employe/{employe}/edit/edit_password', [EmployeController::class, 'editPassword'])->name('employe.edit.password');
Route::put('employe/{employe}/edit/edit_password', [EmployeController::class, 'change_password'])->name('employe.change.password');

Route::get('stagiaire/dashboard', [StagiaireController::class, 'dashboard'])->name('stagiaire.dashboard');

Route::get('departements', [DepartementController::class, 'index'])->name('list.departement');
Route::get('departements/create', [DepartementController::class, 'create'])->name('create.departement');
Route::post('departements', [DepartementController::class, 'store'])->name('store.departement');
Route::get('departements/{departement}/edite', [DepartementController::class, 'edit'])->name('edit.departement');
Route::put('departements/{departement}', [DepartementController::class, 'update'])->name('update.departement');

Route::get('encadreurs', [EncadreurController::class, 'index'])->name('list.encadreur');
Route::get('encadreurs/create', [EncadreurController::class, 'create'])->name('create.encadreur');
Route::post('encadreurs', [EncadreurController::class, 'store'])->name('store.encadreur');
Route::get('encadreurs/{encadreur}/edite', [EncadreurController::class, 'edit'])->name('edit.encadreur');
Route::put('encadreurs/{encadreur}', [EncadreurController::class, 'update'])->name('update.encadreur');

Route::get('specialite', [SpecialiteController::class, 'index'])->name('list.specialite');
Route::get('specialite/create', [SpecialiteController::class, 'create'])->name('create.specialite');
Route::post('specialite', [SpecialiteController::class, 'store'])->name('store.specialite');
Route::get('specialite/{specialite}/edite', [SpecialiteController::class, 'edit'])->name('edit.specialite');
Route::put('specialite/{specialite}', [SpecialiteController::class, 'update'])->name('update.specialite');

Route::get('stage', [StageController::class, 'index'])->name('list.stage');
Route::get('stage/create', [StageController::class, 'create'])->name('create.stage');
Route::post('stage', [StageController::class, 'store'])->name('store.stage');
Route::get('stage/{stage}/edit', [StageController::class , 'edit'])->name('edit.stage');
Route::put('stage/{stage}', [StageController::class, 'update'])->name('update.stage');

Route::get('universite', [UniversiteController::class, 'index'])->name('list.universite');
Route::get('universite/create', [UniversiteController::class, 'create'])->name('create.universite');
Route::post('universite', [UniversiteController::class, 'store'])->name('store.universite');
Route::get('universite/{universite}/edite', [UniversiteController::class, 'edit'])->name('edit.universite');
Route::put('universite/{universite}', [UniversiteController::class, 'update'])->name('update.universite');


Route::resource('users', UserController::class);
Route::resource('stagiaire', StagiaireController::class);
Route::resource('employe', EmployeController::class);
Route::resource('responsable', ResponsableController::class);
