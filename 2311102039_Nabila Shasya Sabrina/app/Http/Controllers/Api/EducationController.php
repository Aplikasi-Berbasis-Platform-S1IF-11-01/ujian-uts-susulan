<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return Education::all();
    }

    public function store(Request $request)
{
    dd($request->all());
    $edu = Education::create([
        'school' => $request->school,
        'major' => $request->major,
        'year' => $request->year
    ]);

    return response()->json($edu);
}

    public function update(Request $request, $id)
    {
        $edu = Education::findOrFail($id);
        $edu->update($request->all());
        return $edu;
    }

    public function destroy($id)
    {
        Education::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

}
