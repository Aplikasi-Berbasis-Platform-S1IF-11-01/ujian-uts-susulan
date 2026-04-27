<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationAdminController extends Controller
{
    public function index()
    {
        $education = Education::orderBy('created_at', 'desc')->get();
        return view('admin.education', compact('education'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required',
            'degree' => 'required',
            'period' => 'required',
            'description' => 'nullable',
        ]);

        Education::create($validated);

        return response()->json(['success' => true, 'message' => 'Data Pendidikan berhasil ditambah!']);
    }

    public function update(Request $request, $id)
    {
        $edu = Education::findOrFail($id);
        $validated = $request->validate([
            'institution' => 'required',
            'degree' => 'required',
            'period' => 'required',
            'description' => 'nullable',
        ]);

        $edu->update($validated);
        return response()->json(['success' => true, 'message' => 'Data Pendidikan berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Education::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Pendidikan berhasil dihapus!']);
    }
}