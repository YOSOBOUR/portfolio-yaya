<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class PortfolioController extends Controller
{
    public function index()
    {
        return response()->json([
            'profile'     => Profile::first(),
            'skills'      => Skill::orderBy('sort')->get(),
            'projects'    => Project::orderBy('sort')->latest()->get(),
            'experiences' => Experience::orderBy('sort')->get(),
        ]);
    }
}
