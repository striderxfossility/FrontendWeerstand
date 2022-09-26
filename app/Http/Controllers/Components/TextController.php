<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\Text;

class TextController extends Controller
{
    public function edit(Text $text)
    {
        return view('pages.components.textEdit', [
            'comp' => $text
        ]);
    }

    public function update(Request $request, Text $text)
    {
        $text->fill($request->all())->save();

        if($text->page != null)
            return to_route('pages.edit', $text->page);
        
        return to_route('projects.edit', $text->project);
    }

    public function destroy(Text $text)
    {
        $text->delete();

        if($text->page != null)
            return to_route('pages.edit', $text->page);
        
        return to_route('projects.edit', $text->project);
    }

    public function create(int $page)
    {
        $text = Text::factory()->create();
        $text->page_id = $page;
        $text->project_id = 0;
        $text->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $text = Text::factory()->create();
        $text->page_id = 0;
        $text->project_id = $project;
        $text->save();

        return to_route('projects.edit', $project);
    }
}
