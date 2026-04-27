<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $about = About::first();

        if ($about) {
            $about->update($request->all());
        } else {
            About::create($request->all());
        }

        return back();
    }
}