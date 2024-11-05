<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return Material::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:class_subjects,id',
            'material_name' => 'required|string',
        ]);

        return Material::create($validated);
    }

    public function show(Material $material)
    {
        return $material;
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:class_subjects,id',
            'material_name' => 'required|string',
        ]);

        $material->update($validated);

        return $material;
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return response()->json(['message' => 'Material deleted successfully.']);
    }
}
