<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('admin.experience', compact('experiences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'image' => 'nullable|image'
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('experiences', 'public');
        }

        Experience::create([
            'company' => $request->company,
            'position' => $request->position,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'image' => $image
        ]);

        return back();
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();
        return back();
    }
}