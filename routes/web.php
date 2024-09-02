<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Models\questions;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\File; // Import the File facade

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::view('/old', 'old')->name('old');
Route::view('/today', 'today')->name('today');

Route::get('/test', function () {
    return 'Test route works!';
});

Route::get('/moistatused', function () {
    $question = questions::get();
    return view('questions', [
        'question' => $question,
    ]);
})->name('questions');

Route::get('/moistatus/{id}', function ($id) {
    $question = questions::with('images')->findOrFail($id);
    //dd($question);
    return view('riddle', [
        'question' => $question,
    ]);
})->name('riddle');



Route::middleware('auth')->group(function () {
    Route::get('/upload', function () {
        return view('upload');
    });
    
    Route::post('/upload', [ImageUploadController::class, 'upload'])->name('image.upload');
    Route::get('/imagesStored', function () {
        // Define the path to the folder containing images
        $folderPath = public_path('images');
    
        // Get all image files from the folder
        $images = File::files($folderPath);
    
        // Pass the images to the Blade view
        return view('imagesStored', ['images' => $images]);
    })->name('images.list');

    Route::delete('/imagesStored/{image}', function ($image) {
        // Define the path to the folder containing images
        $filePath = public_path('images/' . $image);
    
        // Check if the file exists and delete it
        if (File::exists($filePath)) {
            File::delete($filePath);
            return redirect()->route('images.list')->with('success', 'Image deleted successfully.');
        }
    
        return redirect()->route('images.list')->with('error', 'Image not found.');
    })->name('images.delete');

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
