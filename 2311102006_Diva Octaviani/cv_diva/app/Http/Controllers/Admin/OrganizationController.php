<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('sort_order')->get();
        return view('admin.organization.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organization.form', ['organization' => new Organization()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'period'            => 'required|string|max:255',
            'position'          => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'responsibilities'  => 'nullable|string',
            'sort_order'        => 'integer',
        ]);

        $data['responsibilities'] = $this->parseResponsibilities($request->responsibilities);

        Organization::create($data);
        return redirect()->route('admin.organization.index')->with('success', 'Organization berhasil ditambahkan!');
    }

    public function edit(Organization $organization)
    {
        return view('admin.organization.form', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $data = $request->validate([
            'period'            => 'required|string|max:255',
            'position'          => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'responsibilities'  => 'nullable|string',
            'sort_order'        => 'integer',
        ]);

        $data['responsibilities'] = $this->parseResponsibilities($request->responsibilities);

        $organization->update($data);
        return redirect()->route('admin.organization.index')->with('success', 'Organization berhasil diupdate!');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('admin.organization.index')->with('success', 'Organization berhasil dihapus!');
    }

    private function parseResponsibilities(?string $raw): array
    {
        if (!$raw) return [];
        return array_filter(array_map('trim', explode("\n", $raw)));
    }
}