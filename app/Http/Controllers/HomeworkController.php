<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        return Homework::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:class_subjects,id',
            'homework' => 'required|string',
            'created_by' => 'required|exists:users,id',
        ]);

        return Homework::create($validated);
    }

    public function show(Homework $homework)
    {
        return $homework;
    }

    public function update(Request $request, Homework $homework)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:class_subjects,id',
            'homework' => 'required|string',
            'created_by' => 'required|exists:users,id',
        ]);

        $homework->update($validated);

        return $homework;
    }

    public function destroy(Homework $homework)
    {
        $homework->delete();

        return response()->json(['message' => 'Homework deleted successfully.']);
    }
}
