<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\LandingpageController;

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
//Créer une route pour la méthode index
Route::get('/',[LandingpageController::class, 'index'])->name('landing');

//Creer une route pour login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Créer une route pour register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Créer une route pour la méthode logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

//Creer une route pour methode show profile
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

//Créer une route pour la méthode search
Route::get('/', [LandingpageController::class, 'search'])->name('landingpage.search');


//Créer une route pour la méthode show tous les services
Route::get('/{id}/services', [LandingpageController::class, 'show'])->name('category.services');

//Créer une route pour la méthode show une service
Route::get('/{id}/services/{serviceId}', [LandingpageController::class, 'showService'])->name('category.service');


//Créer une route pour la méthode change
Route::post('/change-language', [LanguageController::class, 'change'])->name('language.change');



