<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(questions $questions)
    {
        //
    }


    public function createQuestions(Request $request)
{
    $item = new Questions;
    $item->question = $request->input('questions');
    $item->save();

    $final_images = [];
    $fetched_images = $request->file('images');
    $imageValues = $request->input('image_values', []);

    foreach ($fetched_images as $file) {
        // Generate a unique name for the file
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file and get its path
        $filePath = $file->storeAs('public/images', $filename);
        $image_path = asset(Storage::url($filePath));

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
