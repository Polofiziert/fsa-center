<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Show all Projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projectsAll = Project::with("user")->get();
        $projectsUser = $projectsAll->where('user_id', Auth::user()->id);
    
        return view('projects.index', [
            "projectsAll" => $projectsAll,
            "projectsUser" => $projectsUser,
        ]);
    }

    /**
     * Show a specific Project.
     *
     * @return \Illuminate\View\View
     */
    public function show(Project $project){
        return view('projects.show', [
            "project" => $project
        ]);
    }

    /**
     * Show General project Settings
     * 
     * @return \Illuminate\View\View
     */
    public function settings(Project $project)
    {
        return view('projects.settings', [
            "project" => $project
        ]);
    }

    /**
     * Show the form to create a new Project.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        return view('projects.create');
    }

    /**
     * Store a new Project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'bail|required|unique:projects|max:40',
            'description' => 'required',
            'image' => 'required'
        ]);

        $project = new Project;
        $project->title = $validated["title"];
        $project->description = $validated["description"];
        $project->image = $validated["image"];
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect()->action(
            [ProjectController::class, 'show'], [$project]
        );
    }

    /**
     * Delete a Project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->action(
            [ProjectController::class, 'index']
        );
    }

    /**
     * Update a Project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Request $request)
    {
        $validated = $request->validate([
            'title' => 'bail|unique:projects|max:40',
            'description' => '',
            'image' => ''
        ]);

        if(isset($validated["title"])){
            $project->title = $validated["title"];
        }
        if(isset($validated["description"])){
            $project->description = $validated["description"];
        }
        if(isset($validated["image"])){
            $project->image = $validated["image"];
        }
        $project->update();

        return redirect()->action(
            [ProjectController::class, 'show'], [$project]
        );    }
}
