<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');



Route::get('/moistatused', function () {
    $question = DB::table('questions')->get();
    return view('questions', [
        'question' => $question,
    ]);
})->name('questions');

Route::get('/moistatus/{id}', function ($id) {
    $question = DB::table('questions')->find($id);
    return view('riddle', [
        'question' => $question,
    ]);
})->name('riddle');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/moistatused/create', function () {
        return view('questions-create');
    })->name('questions.create');
    Route::post('/moistatused/create/post', [QuestionsController::class, 'createQuestions'])->name('admin.questions.create');
});

require __DIR__.'/auth.php';
