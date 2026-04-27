<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()->get();
        return view('admin.organization.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organization.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Organization::create([
            'organization_name' => $request->organization_name,
            'role' => $request->role,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.organization.index')
            ->with('success', 'Data organization berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.organization.index');
    }

    public function edit(string $id)
    {
        $organization = Organization::findOrFail($id);
        return view('admin.organization.edit', compact('organization'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $organization = Organization::findOrFail($id);

        $organization->update([
            'organization_name' => $request->organization_name,
            'role' => $request->role,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.organization.index')
            ->with('success', 'Data organization berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return redirect()->route('admin.organization.index')
            ->with('success', 'Data organization berhasil dihapus.');
    }
}