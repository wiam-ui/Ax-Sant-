<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\TraitementController;

use App\Http\Controllers\rendezvousController;
use App\Http\Middleware\Admin;

Route::get('/' , [HomeController::class, 'indexx'])->name('home') ;

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [HomeController::class, 'indexx'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('admin.dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']) -> name('admin.dashboard');
Route::get('profile', [HomeController::class, 'create'])->middleware(['auth', 'user']) -> name('profile');
Route::post('Addpatient', [HomeController::class, 'add'])->middleware(['auth', 'user'])-> name('patient');
Route::get("myprofile",[ProfileController::class,'show'])->name("profile.show")->middleware(['auth', 'user']);
Route::get('informations', [HomeController::class, 'info'])->middleware(['auth', 'user']);

Route::put('/feedbacks/{feedback}/reply', [AdminController::class, 'reply'])->name('admin.feedback.reply')->middleware(['auth', 'admin']);
Route::get('/feed', [HomeController::class, 'show'])->middleware(['auth', 'user'])->name('feed');
Route::get('destroyFeedback/{id}', [HomeController::class, 'destroyFeedback'])->middleware(['auth', 'user']);

Route::get('edit_patient/{id}', [HomeController::class, 'edit'])->middleware(['auth', 'user']);
Route::post('update_patient/{id}', [HomeController::class, 'update'])->middleware(['auth', 'user']);

Route::get('/reser' , [HomeController::class, 'affiche_rendez'])->middleware(['auth', 'user']);
Route::get('/reser/{id}', [HomeController::class, 'destroy'])->name('rendez.destroy')->middleware(['auth', 'user']);

Route::get('/patient', [AdminController::class, 'create'])->middleware(['auth', 'admin']);

Route::get('/medecin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('add_medecin', [AdminController::class, 'ajouter'])->middleware(['auth', 'admin']);
Route::get('delete_medecin/{id}', [AdminController::class, 'supprimer'])->middleware(['auth', 'admin']);
Route::get('edit_medecin/{id}', [AdminController::class, 'edit_medecin'])->middleware(['auth', 'admin']);
Route::post('update_medecin/{id}', [AdminController::class, 'update_medecin'])->middleware(['auth', 'admin']);

Route::get('/consultation', [AdminController::class, 'affiche'])->middleware(['auth', 'admin']);
Route::post('add_consultation', [AdminController::class, 'add_consultation'])->middleware(['auth', 'admin']);
Route::get('delete_consultation/{id}', [AdminController::class, 'delete_consultation'])->middleware(['auth', 'admin']);
Route::get('edit_consultation/{id}', [AdminController::class, 'edit_consultation'])->middleware(['auth', 'admin']);
Route::post('update_consultation/{id}', [AdminController::class, 'update_consultation'])->middleware(['auth', 'admin']);
Route::post('/consultation/{id}/changer-etat', [AdminController::class, 'changerEtat'])->name('consultation.changerEtat');

Route::get('/contenu', [AdminController::class, 'affiche_contenu'])->middleware(['auth', 'admin']);
Route::post('add_contenu', [AdminController::class, 'add_contenu'])->middleware(['auth', 'admin']);
Route::get('delete_contenu/{id}', [AdminController::class, 'delete_contenu'])->middleware(['auth', 'admin']);
Route::get('edit_contenu/{id}', [AdminController::class, 'edit_contenu'])->middleware(['auth', 'admin']);
Route::post('update_contenu/{id}', [AdminController::class, 'update_contenu'])->middleware(['auth', 'admin']);

Route::get('/medicament', [AdminController::class, 'affiche_medicament'])->middleware(['auth', 'admin']);
Route::post('add_medicament', [AdminController::class, 'add_medicament'])->middleware(['auth', 'admin']);
Route::get('delete_medicament/{id}', [AdminController::class, 'delete_medicament'])->middleware(['auth', 'admin']);
Route::get('edit_medicament/{id}', [AdminController::class, 'edit_medicament'])->middleware(['auth', 'admin']);
Route::post('update_medicament/{id}', [AdminController::class, 'update_medicament'])->middleware(['auth', 'admin']);

Route::post('/feedback' , [feedbackController::class, 'add'])->middleware(['auth', 'user'])-> name('feedback');
Route::get('feedback',[AdminController::class, 'create_feedback'])->middleware(['auth', 'admin']);

Route::post('/rendezvous' , [rendezvousController::class, 'store'])->middleware(['auth', 'user'])-> name('rendezvous');
Route::get('/rendez' , [AdminController::class, 'affiche_rendez'])->middleware(['auth', 'admin']);
Route::post('/rendez/{id}/changer-etat', [AdminController::class, 'changer'])->name('changerEtat');
Route::get('/rendezvous/{id}', [AdminController::class, 'destroy'])->name('rendezvous.destroy')->middleware(['auth', 'admin']);

Route::get('/ajouter-traitement-auto', [TraitementController::class, 'ajouterTraitementAuto']);
