<?php

namespace App\Http\Controllers\Components;

use App\Services\DefaultService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Components\BigSlider;

class BigSliderController extends Controller
{
    public function edit(BigSlider $bigslider)
    {
        return view('pages.components.bigSliderEdit', [
            'comp' => $bigslider
        ]);
    }

    public function update(Request $request, BigSlider $bigslider, DefaultService $defaultService)
    {
        $bigslider->fill($request->all())->save();

        $defaultService->updateImage($bigslider, $request);

        if($bigslider->page != null)
            return to_route('pages.edit', $bigslider->page);
        
        return to_route('projects.edit', $bigslider->project);
    }

    public function destroy(BigSlider $bigslider)
    {
        $bigslider->delete();

        if($bigslider->page != null)
            return to_route('pages.edit', $bigslider->page);
        
        return to_route('projects.edit', $bigslider->project);
    }

    public function create(int $page)
    {
        $bigslider = BigSlider::factory()->create();
        $bigslider->page_id = $page;
        $bigslider->project_id = 0;
        $bigslider->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $bigslider = BigSlider::factory()->create();
        $bigslider->page_id = 0;
        $bigslider->project_id = $project;
        $bigslider->save();

        return to_route('projects.edit', $project);
    }
}
