<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Period;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function store(Request $request, $project, Camp $camp) {
        $validated = $request->validate([
            'title' => 'bail|required|unique:periods|max:40',
            'start' => 'required',
            'end' => 'required',
            'age_start' => 'required',
            'age_end' => 'required'
        ]);
        
        $period = new Period;
        $period->title = $validated["title"];
        $period->start = $validated["start"];
        $period->end = $validated["end"];
        $period->age_start = $validated["age_start"];
        $period->age_end = $validated["age_end"];
        $period->camp_id = $camp->id;
        $period->save();
        
        return redirect()->action(
            [CampController::class, 'show'], [$project, $camp]
        );
    }

    public function attachWorkshop(Request $request, $project, $camp, Period $period)
    {            
        $validated = $request->validate([
            'workshops' => 'required|array|min:1'
        ]);
        $period->workshops()->attach($validated["workshops"]);
        return redirect()->action(
            [CampController::class, 'show'], [$project, $camp]
        );
    }
}