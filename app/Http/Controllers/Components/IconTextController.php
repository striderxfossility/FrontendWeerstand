<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\IconText;

class IconTextController extends Controller
{
    public function edit(IconText $icontext)
    {
        return view('pages.components.iconTextEdit', [
            'comp' => $icontext
        ]);
    }

    public function update(Request $request, IconText $icontext)
    {
        $icontext->fill($request->all())->save();

        if($icontext->page != null)
            return to_route('pages.edit', $icontext->page);
        
        return to_route('projects.edit', $icontext->project);
    }

    public function destroy(IconText $icontext)
    {
        $icontext->delete();

        if($icontext->page != null)
            return to_route('pages.edit', $icontext->page);
        
        return to_route('projects.edit', $icontext->project);
    }

    public function create(int $page)
    {
        $icontext = IconText::factory()->create();
        $icontext->page_id = $page;
        $icontext->project_id = 0;
        $icontext->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $icontext = IconText::factory()->create();
        $icontext->page_id = 0;
        $icontext->project_id = $project;
        $icontext->save();

        return to_route('projects.edit', $project);
    }
}
