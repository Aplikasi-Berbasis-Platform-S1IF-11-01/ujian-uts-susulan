<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Profile, Education, Skill, Portfolio};

class DashboardController extends Controller {
    public function index() {
        return view('admin.dashboard', [
            'profileCount' => Profile::count(),
            'eduCount' => Education::count(),
            'skillCount' => Skill::count(),
            'portoCount' => Portfolio::count(),
        ]);
    }
}
