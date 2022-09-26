<?php

namespace App\Http\Controllers\Components;

use App\Services\DefaultService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\Image;

class ImageController extends Controller
{
    public function edit(Image $image)
    {
        return view('pages.components.imageEdit', [
            'comp' => $image
        ]);
    }

    public function update(Request $request, Image $image, DefaultService $defaultService)
    {
        $image->fill($request->all())->save();

        $defaultService->updateImage($image, $request);

        if($image->page != null)
            return to_route('pages.edit', $image->page);
        
        return to_route('projects.edit', $image->project);
    }

    public function destroy(Image $image)
    {
        $image->delete();

        if($image->page != null)
            return to_route('pages.edit', $image->page);
        
        return to_route('projects.edit', $image->project);
    }

    public function create(int $page)
    {
        $image = Image::factory()->create();
        $image->page_id = $page;
        $image->project_id = 0;
        $image->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $image = Image::factory()->create();
        $image->page_id = 0;
        $image->project_id = $project;
        $image->save();

        return to_route('projects.edit', $project);
    }
}
