<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $projects = Project::active()
            ->with(['media', 'tags'])
            ->latest()
            ->get();

        return view('index', compact('projects'));
    }
}
