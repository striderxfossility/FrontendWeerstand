<?php

namespace App\Http\Controllers\Components;

use App\Services\DefaultService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\Slider;

class SliderController extends Controller
{
    public function edit(Slider $slider)
    {
        return view('pages.components.sliderEdit', [
            'comp' => $slider
        ]);
    }

    public function update(Request $request, Slider $slider, DefaultService $defaultService)
    {
        $slider->fill($request->all())->save();

        $defaultService->updateImage($slider, $request);

        if($slider->page != null)
            return to_route('pages.edit', $slider->page);
        
        return to_route('projects.edit', $slider->project);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        if($slider->page != null)
            return to_route('pages.edit', $slider->page);
        
        return to_route('projects.edit', $slider->project);
    }

    public function create(int $page)
    {
        $slider = Slider::factory()->create();
        $slider->page_id = $page;
        $slider->project_id = 0;
        $slider->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $slider = Slider::factory()->create();
        $slider->page_id = 0;
        $slider->project_id = $project;
        $slider->save();

        return to_route('projects.edit', $project);
    }
}
