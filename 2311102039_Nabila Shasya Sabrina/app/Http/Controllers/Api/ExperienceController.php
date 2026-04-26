<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    // READ
    public function index()
    {
        return response()->json(Experience::all());
    }

    // CREATE
    public function store(Request $request)
    {
        return Experience::create([
            'position' => $request->position,
            'company' => $request->company,
            'year' => $request->year,
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $exp = Experience::findOrFail($id);

        $exp->update([
            'position' => $request->position,
            'company' => $request->company,
            'year' => $request->year,
        ]);

        return response()->json(['message' => 'updated']);
    }

    // DELETE
    public function destroy($id)
    {
        Experience::destroy($id);

        return response()->json(['message' => 'deleted']);
    }
}