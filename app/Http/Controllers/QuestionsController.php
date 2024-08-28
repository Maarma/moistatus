<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuestionsController extends Controller
{
    
    
    public function createQuestions(Request $request)
{
    // Validate the input data
    $request->validate([
        'questions' => 'required|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image_values' => 'nullable|array'
    ]);

    // Create a new question
    $item = new Questions;
    $item->question = $request->input('questions');
    $item->save();

    $final_images = [];
    $fetched_images = $request->file('images', []); // Get all uploaded images, or an empty array if none
    $imageValues = $request->input('image_values', []);

    foreach ($fetched_images as $file) {
        // Generate a unique name for the file
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'public/images' directory
        $file->move(public_path('images'), $filename);

        // Generate the accessible URL for the stored image
        $image_path = asset('images/' . $filename);

        // Check if the current file name is in the list of correct answers
        $isCorrectAnswer = in_array($file->getClientOriginalName(), $imageValues);

        // Store the image details in the final_images array
        $final_images[] = [
            'path' => $image_path,
            'isCorrectAnswer' => $isCorrectAnswer,
            'questions_id' => $item->id
        ];

        // Save the image details in the database
        Image::create([
            'path' => $image_path,
            'isCorrectAnswer' => $isCorrectAnswer,
            'questions_id' => $item->id
        ]);
    }

    return redirect()->route('questions')->with('success', 'Data updated successfully.');
}


    public function editQuestions(Request $request,)
    {
        $id = $request->input('id');
        $item = Questions::where('id', $id)->get()[0];
        $item->question = $request->input('question');
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $path = $image->storeAs('public/images/', $filename);
        //     $item->image = $filename;
        // }
        $item->save();
        return redirect()->route('questions')->with('success', 'Data updated successfully.');
    }

    public function deleteQuestions(Request $request,)
    {
        $id_list = explode('&', $_SERVER['QUERY_STRING']);
        $id = $id_list[0];

        $item = Questions::findOrFail($id);
        $item->delete();
        return redirect()->route('questions')->with('success', 'Data updated successfully.');
    }
}
