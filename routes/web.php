<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Models\questions;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');



Route::get('/moistatused', function () {
    $question = questions::get();
    return view('questions', [
        'question' => $question,
    ]);
})->name('questions');

Route::get('/moistatus/{id}', function ($id) {
    $question = questions::with('images')->find($id);
    return view('riddle', [
        'question' => $question,
    ]);
})->name('riddle');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/moistatused/create', function () {
        $images = [];

        return view('questions-create', [
            'images' => $images 
        ]);
    })->name('questions.create');
    Route::post('/moistatused/create/post', [QuestionsController::class, 'createQuestions'])->name('admin.questions.create');

    Route::get('/moistatused/edit/{id}', function ($id) {
        $question = questions::where('id', $id)->get()[0];
        return view('questions-edit', [
            'question' => $question
        ]);
    })->name('questions.edit');
    Route::post('/moistatused/edit/post', [QuestionsController::class, 'editQuestions'])->name('admin.questions.update');

    Route::get('/moistatused/delete/{id}', function ($id) {
        $question = DB::table('questions')->where('id', $id)->get()[0];
        return view('questions-delete', [
            'question' => $question
        ]);
    })->name('questions.delete');
    Route::post('/moistatused/delete/post', [QuestionsController::class, 'deleteQuestions'])->name('admin.questions.delete');
});

require __DIR__.'/auth.php';
