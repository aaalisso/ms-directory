<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UbigeoController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\Institution_PersonController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use Faker\Guesser\Name;

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

//Ubigeo
Route::get('ubigeo', [UbigeoController::class, 'index']);
Route::post('add-ubigeo', [UbigeoController::class, 'store']);
Route::get('edit-ubigeo/{id}', [UbigeoController::class, 'edit']);
Route::put('update-ubigeo/', [UbigeoController::class, 'update']);
Route::delete('delete-ubigeo/', [UbigeoController::class, 'destroy']);
//Person
Route::get('person', [PersonController::class, 'index']);
Route::post('add-person', [PersonController::class, 'store']);
Route::get('edit-person/{id}', [PersonController::class, 'edit']);
Route::put('update-person', [PersonController::class, 'update']);
Route::delete('delete-person', [PersonController::class, 'destroy']);
//Person
Route::get('institution', [InstitutionController::class, 'index']);
Route::post('add-institution', [InstitutionController::class, 'store']);
Route::get('edit-institution/{id}', [InstitutionController::class, 'edit']);
Route::put('update-institution', [InstitutionController::class, 'update']);
Route::delete('delete-institution', [InstitutionController::class, 'destroy']);
//Person
Route::get('user', [UserController::class, 'index'])->name('user');
Route::post('add-user', [UserController::class, 'store']);
Route::get('edit-user/{id}', [UserController::class, 'edit']);
Route::put('update-user', [UserController::class, 'update']);
Route::delete('delete-user/{id}', [UserController::class, 'delete']);
Route::get('user/get-roles/{id}', [UserController::class, 'get_roles'])->name('getroles');
Route::put('user/change_role/{id}', [UserController::class, 'change']);
Route::get('user/show_add_role', [UserController::class, 'show_add_role']);
Route::post('user/add_role', [UserController::class, 'add_role']);
//Person
Route::get('institution_person', [Institution_PersonController::class, 'index']);
Route::post('add-institution_person', [Institution_PersonController::class, 'store']);
Route::get('edit-institution_person/{id}', [Institution_PersonController::class, 'edit']);
Route::put('update-institution_person', [Institution_PersonController::class, 'update']);
Route::delete('delete-institution_person', [Institution_PersonController::class, 'destroy']);


// Route::group(['middleware' => ['guest']], function () {
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


//Login
Route::get('login', [LoginController::class, 'show'])->name('login');
// Route::get('checklogin', [LoginController::class, 'index']);
// Route::post('dashboard', [LoginController::class, 'authenticate'])->middleware('auth')->name('authenticate');
Route::post('dashboard', [LoginController::class, 'authenticate'])->name('authenticate');
//postlogin
Route::get('admin', [LoginController::class, 'admin'])->name('admin');


//register
Route::get('register', [RegisterController::class, 'index']);
Route::post('add-register', [RegisterController::class, 'store']);


Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Route
     */
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});



// Route::get('/1', function () {
//     return view('readme');
// });
