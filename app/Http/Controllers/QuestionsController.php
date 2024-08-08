<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;

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


    public function createQuestions(Request $request, )
    {
        $item = new Questions;
        $item->question = $request->input('questions');
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $path = $image->storeAs('public/images/', $filename);
        //     $item->image = $filename;
        // }
        $item->save();
        return redirect()->route('questions')->with('success', 'Data updated successfully.');
    }

    public function editQuestions(Request $request, )
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
}
