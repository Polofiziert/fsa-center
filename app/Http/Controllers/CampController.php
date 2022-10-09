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
        
        Camp::create(array_merge($this->validateCamp(), [
            'project_id' => $project->id,
        ]));

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
        $camps = Project::find($project->id)->camps; 
        $periods = Camp::find($camp->id)->periods;
        //$workshops = $camp->workshops()->get();
        return view('camps.show', [
            "project" => $project,
            "camp" => $camp,
            "camps" => $camps,
            "periods" => $periods
        ]);
    }

    /**
     * Delete a Camp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Camp $camp)   //TODO: add success message
    {
        $camp->delete();
        return redirect()->action(
            [CampController::class, 'index']
        );
    }

    /**
     * Update a Camp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Camp $camp)
    {
        $attributes = $this->validatePost($camp);

        $camp->update($attributes);

        return redirect()->action(
            [ProjectController::class, 'show'], [$camp]
        );    
    }
    
    protected function validateCamp(?Camp $camp = null): array
    {
        $camp ??= new Camp();

        return request()->validate([
            'title' => 'bail|required|unique:camps|max:40',
            'description' => 'required',
            'image' => 'required',
            'charge' => 'required|numeric',
            'charge_reduced' => 'required|numeric',
            'age_start' => 'required|numeric',
            'age_end' => 'required|numeric',
            'type' => 'required|max:40',
        ]);
    }
}
