<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\DropdownController;
use App\Http\Middleware\SessionLogin;

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
// Route::view('RegisterForm','register_form');

Route::get('RegisterForm', [SampleController::class, 'index']);

Route::post ('FetchRegister',       [SampleController::class, 'register_fetch_data']);
Route::get  ('display_data',        [SampleController::class, 'fetch_data_registration']);
Route::get  ('edit_user/{id}',      [SampleController::class, 'fetch_data_for_edit']);
Route::get  ('delete_user/{id}',    [SampleController::class, 'delete_user_registration']);
Route::post ('Update_registration', [SampleController::class, 'update_data_registration']);

Route::get  ('department_data',             [SampleController::class, 'department_data']);
Route::get  ('delete_user1/{id}',            [SampleController::class, 'departmen_delet_data']);
Route::post ('department_fetch',            [SampleController::class, 'department_fetch_data']);
Route::get  ('department_edit_user/{id}',   [SampleController::class, 'Department_edit_data']);
Route::post ('update_department',           [SampleController::class, 'update_data_department']);
Route::view ('department_registration','department_registration');


Route::get('dropdown',          [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);
