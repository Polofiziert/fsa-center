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

        return view('camps.index', [
            'camps' => $camps,
            'project' => $project
        ]);
    }

    /**
     * Show the form to create a new Camp.
     *
     * @return \Illuminate\View\View
     */
    public function create(Project $project){
        return view('camps.create', [
            'project' => $project
        ]);
    }

    /**
     * Store a new Camp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project) {
        $validated = $request->validate([
            'title' => 'bail|required|unique:camps|max:40',
            'description' => 'required',
            'image' => 'required',
            'charge' => 'required|numeric',
            'charge_reduced' => 'required|numeric',
            'age_start' => 'required|numeric',
            'age_end' => 'required|numeric',
            'type' => 'required|max:40',
        ]);

        $camp = new Camp;
        $camp->title = $validated["title"];
        $camp->description = $validated["description"];
        $camp->image = $validated["image"];
        $camp->type = $validated["type"];
        $camp->charge = $validated["charge"];
        $camp->charge_reduced = $validated["charge_reduced"];
        $camp->age_start = $validated["age_start"];
        $camp->age_end = $validated["age_end"];
        $camp->project_id = $project->id;
        $camp->save();

        return redirect()->action(
            [CampController::class, 'index'], [$project]
        );
    }

    /**
     * Show a specific Camp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Camp $camp){
        return view('project', [
            "project" => $project,
            "camp" => $camp
        ]);
    }

}
