<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
        return ClassSubject::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'created_by' => 'required|exists:users,id',
            'is_active' => 'boolean',
        ]);

        return ClassSubject::create($validated);
    }

    public function show(ClassSubject $classSubject)
    {
        return $classSubject;
    }

    public function update(Request $request, ClassSubject $classSubject)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'created_by' => 'required|exists:users,id',
            'is_active' => 'boolean',
        ]);

        $classSubject->update($validated);

        return $classSubject;
    }

    public function destroy(ClassSubject $classSubject)
    {
        $classSubject->delete();

        return response()->json(['message' => 'Class subject deleted successfully.']);
    }
}
