<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\TwoText;

class TwoTextController extends Controller
{
    public function edit(TwoText $twotext)
    {
        return view('pages.components.twoTextEdit', [
            'comp' => $twotext
        ]);
    }

    public function update(Request $request, TwoText $twotext)
    {
        $twotext->fill($request->all())->save();

        if($twotext->page != null)
            return to_route('pages.edit', $twotext->page);
        
        return to_route('projects.edit', $twotext->project);
    }

    public function destroy(TwoText $twotext)
    {
        $twotext->delete();

        if($twotext->page != null)
            return to_route('pages.edit', $twotext->page);
        
        return to_route('projects.edit', $twotext->project);
    }

    public function create(int $page)
    {
        $twotext = TwoText::factory()->create();
        $twotext->page_id = $page;
        $twotext->project_id = 0;
        $twotext->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $twotext = TwoText::factory()->create();
        $twotext->page_id = 0;
        $twotext->project_id = $project;
        $twotext->save();

        return to_route('projects.edit', $project);
    }
}
