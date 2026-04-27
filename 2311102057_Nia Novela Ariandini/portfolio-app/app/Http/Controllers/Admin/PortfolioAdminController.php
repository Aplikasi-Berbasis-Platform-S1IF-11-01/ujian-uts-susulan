<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioAdminController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.portfolio', compact('projects'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'link' => 'nullable',
            ]);

            $filename = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('', $filename, 'public');
            }

            Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filename,
                'link' => $request->link,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Project berhasil ditambahkan'
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan project',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}