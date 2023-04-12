<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\TestimonialController;


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
    //Resume
    //Education
    Route::get('admin-education',[EducationController::class,'admin_education'])->name('education');
    Route::post('add-education',[EducationController::class,'add_education']);
    Route::get('education-edit/{id}',[EducationController::class,'editEducationPage']);
    Route::post('edit-education/{id}',[EducationController::class,'editEducation'])->name('editEducation');
    Route::get('education-delete/{id}',[EducationController::class,'deleteEducation']);
    //Experience
    Route::get('admin-experience',[ExperienceController::class,'admin_experience'])->name('experience');
    Route::post('add-experience',[ExperienceController::class,'add_experience']);
    Route::get('experience-edit/{id}',[ExperienceController::class,'editExperiencePage']);
    Route::post('edit-experience/{id}',[ExperienceController::class,'editExperience'])->name('editExperience');
    Route::get('experience-delete/{id}',[ExperienceController::class,'deleteExperience']);

   //Testimonials
   Route::get('admin-testimonial',[TestimonialController::class,'admin_testimonial'])->name('testimonial');
   Route::post('add-testimonial',[TestimonialController::class,'add_testimonial']);
//    Route::get('experience-edit/{id}',[ExperienceController::class,'editExperiencePage']);
//    Route::post('edit-experience/{id}',[ExperienceController::class,'editExperience'])->name('editExperience');
//    Route::get('experience-delete/{id}',[ExperienceController::class,'deleteExperience']);





});
Route::get('admin', [Controller::class,'login'])->name('admin_login');
Route::post('login',[Controller::class,'loginAdmin']);
Route::get('work-single/{id}',[PortfolioController::class,'work_single']);
Route::get('work',[PortfolioController::class,'work']);

