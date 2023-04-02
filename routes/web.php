<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;

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
Route::get('/', [Controller::class,'index']);
Route::group(['middleware' => 'adminAuth'], function(){
    Route::get('adminPage', [Controller::class,'adminPage']);
    Route::get('logout',[Controller::class,'logout']);
    // Services 
    Route::get('admin-services',[ServiceController::class,'admin_services']);
    Route::post('add-service',[ServiceController::class,'add_service'])->name('services');
    Route::get('service-edit/{id}',[ServiceController::class,'service_edit']);
    Route::post('edit-service/{id}',[ServiceController::class,'edit_service']);
    Route::get('service-delete/{id}',[ServiceController::class,'service_delete']);
    // Skills 
    Route::get('admin-skills',[SkillController::class,'admin_skills']);
    Route::post('add-skill',[SkillController::class,'add_skill']);
    Route::get('skill-edit/{id}',[SkillController::class,'skill_edit']);
    Route::post('edit-skill/{id}',[SkillController::class,'edit_skill']);
    Route::get('skill-delete/{id}',[SkillController::class,'skill_delete']);
    // Portfolio 
    Route::get('admin-portfolio',[PortfolioController::class,'admin_portfolio']);
    Route::post('add-portfolio',[PortfolioController::class,'add_portfolio']);
    Route::get('edit-portfolio/{id}',[PortfolioController::class,'edit_portfolio']);
    Route::post('edit-portfolio/{id}',[PortfolioController::class,'portfolio_edit']);

});
Route::get('admin', [Controller::class,'login'])->name('admin_login');
Route::post('login',[Controller::class,'loginAdmin']);
Route::get('work-single/{id}',[PortfolioController::class,'work_single']);
