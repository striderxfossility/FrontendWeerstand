<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\Title;

class TitleController extends Controller
{
    public function edit(Title $title)
    {
        return view('pages.components.titleEdit', [
            'comp' => $title
        ]);
    }

    public function update(Request $request, Title $title)
    {
        $title->fill($request->all())->save();

        if($title->page != null)
            return to_route('pages.edit', $title->page);
        
        return to_route('projects.edit', $title->project);
    }

    public function destroy(Title $title)
    {
        $title->delete();

        if($title->page != null)
            return to_route('pages.edit', $title->page);
        
        return to_route('projects.edit', $title->project);
    }

    public function create(int $page)
    {
        $title = Title::factory()->create();
        $title->page_id = $page;
        $title->project_id = 0;
        $title->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $title = Title::factory()->create();
        $title->page_id = 0;
        $title->project_id = $project;
        $title->save();

        return to_route('projects.edit', $project);
    }
}
