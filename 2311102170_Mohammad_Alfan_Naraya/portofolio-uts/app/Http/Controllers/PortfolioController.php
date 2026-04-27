<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'profile' => Profile::first(),
            'skills' => Skill::orderBy('urutan', 'asc')->get(),
            'projects' => Project::orderBy('urutan', 'asc')->get()
        ]);
    }

    // --- LOGIC PROFILE ---
    public function updateProfile(Request $request)
    {
        $profile = Profile::first() ?? new Profile();
        
        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->nim = $request->nim;
        $profile->program_studi = $request->program_studi;
        $profile->title = $request->title;
        $profile->short_bio = $request->short_bio;
        $profile->about_me = $request->about_me;
        $profile->email = $request->email;
        $profile->instagram = $request->instagram;
        $profile->github = $request->github;

        if ($request->hasFile('foto')) {
            if ($profile->foto) { Storage::delete('public/' . $profile->foto); }
            $profile->foto = $request->file('foto')->store('profile_photos', 'public');
        }

        $profile->save();
        return back()->with('status', 'Profil berhasil diperbarui!');
    }

    // --- LOGIC SKILLS ---
    public function addSkill(Request $request)
    {
        Skill::create($request->only(['nama_skill', 'persentase', 'urutan']));
        return back()->with('status', 'Skill berhasil ditambah!');
    }

    public function updateSkill(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($request->only(['nama_skill', 'persentase', 'urutan']));
        return back()->with('status', 'Skill berhasil diupdate!');
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        return back()->with('status', 'Skill berhasil dihapus!');
    }

    // --- LOGIC PROJECTS ---
    public function addProject(Request $request)
    {
        $project = new Project($request->only(['judul_project', 'deskripsi_project', 'link_project', 'urutan']));

        if ($request->hasFile('gambar_project')) {
            $project->gambar_project = $request->file('gambar_project')->store('projects', 'public');
        }

        $project->save();
        return back()->with('status', 'Project berhasil ditambah!');
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->fill($request->only(['judul_project', 'deskripsi_project', 'link_project', 'urutan']));

        if ($request->hasFile('gambar_project')) {
            if ($project->gambar_project) { Storage::delete('public/' . $project->gambar_project); }
            $project->gambar_project = $request->file('gambar_project')->store('projects', 'public');
        }

        $project->save();
        return back()->with('status', 'Project berhasil diupdate!');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->gambar_project) { Storage::delete('public/' . $project->gambar_project); }
        $project->delete();
        return back()->with('status', 'Project berhasil dihapus!');
    }

    // API UNTUK HALAMAN DEPAN
    public function getApiData()
    {
        return response()->json([
            'profile' => Profile::first(),
            'skills' => Skill::orderBy('urutan', 'asc')->get(),
            'projects' => Project::orderBy('urutan', 'asc')->get()
        ]);
    }
}