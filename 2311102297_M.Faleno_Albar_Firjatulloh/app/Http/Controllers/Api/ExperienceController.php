<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order')->orderByDesc('start_date')->get();
        return response()->json($experiences);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company'    => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'description'=> 'required|string',
            'start_date' => 'required|string',
            'end_date'   => 'nullable|string',
            'is_current' => 'boolean',
        ]);
        $exp = Experience::create($request->all());
        return response()->json(['message' => 'Experience added', 'experience' => $exp], 201);
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($request->all());
        return response()->json(['message' => 'Experience updated', 'experience' => $experience]);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json(['message' => 'Experience deleted']);
    }
}