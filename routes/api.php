<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('companies', 'index');
    Route::post('companies', 'store');
    Route::get('companies/{id}', 'show');
    Route::put('companies/{id}', 'update');
    Route::delete('companies/{id}', 'destroy');
}); 
Route::controller(ServiceController::class)->group(function () {
    Route::get('/companies/{company}/services', 'index');
    Route::post('/companies/{company}/services/', 'store');
    Route::get('/companies/{company}/services/{service}', 'show');
    Route::put('/companies/{company}/services/{service}', 'update');
    Route::delete('/companies/{company}/services/{service}', 'destroy');
}); 
Route::controller(CustomerController::class)->group(function () {
    Route::get('/companies/{company}/services/{service}/customers', 'index');
    Route::post('/companies/{company}/services/{service}/customers', 'store');
    Route::get('/companies/{company}/services/{service}/customers/{customer_id}', 'show');
    Route::put('/companies/{company}/services/{service}/customers/{customer}', 'update');
    Route::delete('/companies/{company}/services/{service}/customers/{customer}', 'destroy');
}); 

