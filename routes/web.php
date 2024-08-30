<?php

use App\Http\Controllers\BilletController;
use App\Http\Controllers\ChefSectionController;
use App\Http\Controllers\CompteRenduController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\ProfileController;
use App\Models\ChefSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;




Route::middleware('auth')->group( function(){
    Route::get('/', function () {
        return view('welcome');
    });
// Billets routes
Route::get('billets/index',[BilletController::class,'index']);
Route::get('billets/create',[BilletController::class,'create']);
Route::post('/billets/create',[BilletController::class,'store']);
Route::get('/billets/{id}',[BilletController::class,'show']);
Route::get('/billets/{id}/edit',[BilletController::class,'edit']);
Route::delete('billets/{id}',[BilletController::class,'destroy'])->name('billets.destroy');
Route::patch('billets/{id}', [BilletController::class,'update']);

// Elements routes

// get all elements records
Route::get('/elements',[ElementController::class,'index']);

Route::get('/elements/create', [ElementController::class,'create']);

Route::post('/elements/create', [ElementController::class, 'store']);
// show
Route::get('/elements/{id}', [ElementController::class,'show']);
// edit
Route::get('/elements/{id}/edit', [ElementController::class,'edit']);

// update element

Route::patch('/elements/{id}',[ElementController::class, 'update']);
Route::delete('/elements/{id}',[ElementController::class,'destroy'])->name('elements.destroy');

// demandes elements
Route::get('elements/{id}/demande/index', [DemandeController::class,'element_index']);
Route::get('elements/{id}/demande/create', [DemandeController::class,'element_create']);
Route::post('/elements/{id}/demande/index', [DemandeController::class,'store']);
Route::get('elements/{element_id}/demande/{demande_id}/', [DemandeController::class,'element_show']);
// Compte-rendu elements

Route::get('elements/{id}/compte_rendu/index', [CompteRenduController::class,'element_index']);
Route::get('elements/{id}/compte_rendu/create', [CompteRenduController::class,'element_create']);
Route::post('/elements/{id}/compte_rendu/index', [CompteRenduController::class,'store']);
Route::get('elements/{element_id}/compte_rendu/{compte_rendu_id}/show', [CompteRenduController::class,'element_show']);
Route::delete('elements/{element_id}/compte_rendu/{compte_rendu_id}', [CompteRenduController::class,'element_destroy'])->name('comptes.destroy');


// Chef Section routes

// get all chef section records

Route::get('/chef_sections', [ChefSectionController::class,'index']);

// Create chef section
Route::get('/chef_sections/create', [ChefSectionController::class,'create']);

Route::post('/chef_sections/create',[ChefSectionController::class, 'store']);

// Show one record of chef section
Route::get('/chef_sections/{id}', [ChefSectionController::class,'show']);

// Edit chef section
Route::get('/chef_sections/{id}/edit',[ChefSectionController::class,'edit']);

// update chef 
Route::patch('/chef_sections/{id}',[ChefSectionController::class,'update']);

// delete chef
Route::delete('/chef_sections/{id}', [ChefSectionController::class, 'destroy'])->name('chef_sections.destroy');

// demande chef

Route::get('chef_sections/{id}/demande/index', [DemandeController::class,'chef_index']);
Route::get('chef_sections/{id}/demande/create', [DemandeController::class,'chef_create']);
Route::post('/chef_sections/{id}/demande/index', [DemandeController::class,'store']);
Route::get('chef_sections/{chef_section_id}/demande/{demande_id}/', [DemandeController::class,'chef_show']);
// Compte-rendu chef

Route::get('chef_sections/{id}/compte_rendu/index', [CompteRenduController::class,'chef_index']);
Route::get('chef_sections/{id}/compte_rendu/create', [CompteRenduController::class,'chef_create']);
Route::post('/chef_sections/compte_rendu/index', [CompteRenduController::class,'store']);
Route::get('chef_sections/{chef_section_id}/compte_rendu/{compte_rendu_id}/show', [CompteRenduController::class,'chef_show']);
Route::delete('chef_sections/{chef_section_id}/compte_rendu/{compte_rendu_id}', [CompteRenduController::class,'chef_destroy'])->name('comptes.destroy');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
