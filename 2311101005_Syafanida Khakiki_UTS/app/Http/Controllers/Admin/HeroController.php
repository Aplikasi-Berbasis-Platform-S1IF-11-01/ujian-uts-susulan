<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'greeting' => 'required',
            'name' => 'required',
            'title' => 'required'
        ]);

        $hero = Hero::first();

        if ($hero) {
            $hero->update($request->all());
        } else {
            Hero::create($request->all());
        }

        return back();
    }
}