<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller {
    public function index() {
        return response()->json(Project::latest()->get());
    }
}