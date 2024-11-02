<?php

namespace App\Http\Controllers;

use App\Models\Role; // Import the Role model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::all(); // Fetch all roles
        return response()->json($roles); // Return roles as JSON
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        // Typically not used in API; can return a view if using Blade templates
        return response()->json(['message' => 'Show form for creating a new role']);
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_name' => 'required|string|unique:roles|max:255',
        ]);

        $role = Role::create($validatedData); // Create a new role

        return response()->json($role, 201); // Return the created role
    }

    /**
     * Display the specified role.
     */
    public function show(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json($role); // Return the role
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(string $id)
    {
        // Typically not used in API; can return a view if using Blade templates
        return response()->json(['message' => 'Show form for editing role with ID ' . $id]);
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $validatedData = $request->validate([
            'role_name' => 'required|string|unique:roles,role_name,' . $id . '|max:255',
        ]);

        $role->update($validatedData); // Update the role

        return response()->json($role); // Return the updated role
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $role->delete(); // Delete the role

        return response()->json(['message' => 'Role deleted successfully'], 200); // Return success message
    }
}
