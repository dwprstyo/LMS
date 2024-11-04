<?php

namespace App\Http\Controllers;

use App\Models\Role; // Import the Role model
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::all();

        return Inertia::render('Roles/Index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        // Render the React component for creating a role
        return Inertia::render('Roles/Create');
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_name' => 'required|string|unique:roles|max:255',
        ]);

        $role = Role::create($validatedData);

        // Redirect to the roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified role.
     */
    public function show(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->withErrors(['message' => 'Role not found.']);
        }

        // Render the React component to display a role
        return Inertia::render('Roles/Show', [
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->withErrors(['message' => 'Role not found.']);
        }

        // Render the React component for editing a role
        return Inertia::render('Roles/Edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->withErrors(['message' => 'Role not found.']);
        }

        $validatedData = $request->validate([
            'role_name' => 'required|string|unique:roles,role_name,' . $id . '|max:255',
        ]);

        $role->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->withErrors(['message' => 'Role not found.']);
        }

        $role->delete();

        // Redirect back with a success message
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
