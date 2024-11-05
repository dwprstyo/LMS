<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        return Submission::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'homework_id' => 'required|exists:homework,id',
            'user_id' => 'required|exists:users,id',
            'file_path' => 'required|string',
        ]);

        return Submission::create($validated);
    }

    public function show(Submission $submission)
    {
        return $submission;
    }

    public function update(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'homework_id' => 'required|exists:homework,id',
            'user_id' => 'required|exists:users,id',
            'file_path' => 'required|string',
        ]);

        $submission->update($validated);

        return $submission;
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();

        return response()->json(['message' => 'Submission deleted successfully.']);
    }
}
