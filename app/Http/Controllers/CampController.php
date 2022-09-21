<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Project;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class CampController extends Controller
{
    /**
     * Show all Camps.
     *
     * @return \Illuminate\View\View
     */
    public function index(Project $project)
    {
        $camps = Project::find($project->id)->camps; //TODO: Have to Add Periods and Workshops to Camp object

        return view('camps', [
            'camps' => $camps,
            'project' => $project
        ]);
    }
}
