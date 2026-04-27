<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'nullable|image'
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $image
        ]);

        return back();
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return back();
    }
}