<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// company
Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::get('/create_company', [App\Http\Controllers\CompanyController::class, 'create'])->name('create_company');
Route::post('/store_company', [App\Http\Controllers\CompanyController::class, 'store'])->name('store_company');
Route::post('/ajax_index', [App\Http\Controllers\CompanyController::class, 'ajax_index'])->name('ajax_index');
Route::get('/edit_company/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('edit_company');
Route::patch('/update_company/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('update_company');
Route::get('/view_company/{id}', [App\Http\Controllers\CompanyController::class, 'view'])->name('view_company');
Route::get('/delete_company/{id}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('delete_company');

//director 


Route::post('/store_director', [App\Http\Controllers\CompanyController::class, 'store_director'])->name('store_director');
Route::patch('/update_director/{id}', [App\Http\Controllers\CompanyController::class, 'update_director'])->name('update_director');
Route::delete('/delete_director/{id}', [App\Http\Controllers\CompanyController::class, 'delete_director'])->name('delete_director');


//committee

Route::post('/store_committee', [App\Http\Controllers\CompanyController::class, 'store_committee'])->name('store_committee');
Route::patch('/update_committee/{id}', [App\Http\Controllers\CompanyController::class, 'update_committee'])->name('update_committee');
Route::delete('/delete_committee/{id}', [App\Http\Controllers\CompanyController::class, 'delete_committee'])->name('delete_committee');


//composition
Route::get('/create_composition/{id}', [App\Http\Controllers\CompanyController::class, 'create_composition'])->name('create_composition');
Route::post('/store_composition', [App\Http\Controllers\CompanyController::class, 'store_composition'])->name('store_composition');
Route::get('/edit_composition/{id}', [App\Http\Controllers\CompanyController::class, 'edit_composition'])->name('edit_composition');


// director
Route::get('/director', [App\Http\Controllers\DirectorController::class, 'index'])->name('director');
Route::get('/create_director', [App\Http\Controllers\DirectorController::class, 'create'])->name('create_director');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
});


//Search Controller
//director
Route::get('/search_director', [App\Http\Controllers\SearchController::class, 'search_director'])->name('search_director')->middleware(['role_or_permission:NonEntry']);
Route::post('/result_director', [App\Http\Controllers\SearchController::class, 'result_director'])->name('result_director')->middleware(['role_or_permission:NonEntry']);
Route::get('/view_director/{id}', [App\Http\Controllers\SearchController::class, 'view_director'])->name('view_director')->middleware(['role_or_permission:NonEntry']);
	
//company
Route::get('/search_company', [App\Http\Controllers\SearchController::class, 'search_company'])->name('search_company')->middleware(['role_or_permission:NonEntry']);
Route::post('/result_company', [App\Http\Controllers\SearchController::class, 'result_company'])->name('result_company')->middleware(['role_or_permission:NonEntry']);


//sector
Route::get('/search_sector', [App\Http\Controllers\SearchController::class, 'search_sector'])->name('search_sector')->middleware(['role_or_permission:NonEntry']);
Route::post('/search_industry', [App\Http\Controllers\SearchController::class, 'search_industry'])->name('search_industry')->middleware(['role_or_permission:NonEntry']);
Route::post('/result_sector', [App\Http\Controllers\SearchController::class, 'result_sector'])->name('result_sector')->middleware(['role_or_permission:NonEntry']);
Route::post('/result_sector_final', [App\Http\Controllers\SearchController::class, 'result_sector_final'])->name('result_sector_final')->middleware(['role_or_permission:NonEntry']);

// Route::post('/result_director', [App\Http\Controllers\SearchController::class, 'result_director'])->name('result_director');
// Route::get('/view_director/{id}', [App\Http\Controllers\SearchController::class, 'view_director'])->name('view_director');


//custom
Route::get('/search_custom', [App\Http\Controllers\SearchController::class, 'search_custom'])->name('search_custom')->middleware(['role_or_permission:NonEntry']);
Route::post('/result_custom', [App\Http\Controllers\SearchController::class, 'result_custom'])->name('result_custom')->middleware(['role_or_permission:NonEntry']);
Route::post('/result_custom_final', [App\Http\Controllers\SearchController::class, 'result_custom_final'])->name('result_custom_final')->middleware(['role_or_permission:NonEntry']);





Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');