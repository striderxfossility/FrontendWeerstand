<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\Button;

class ButtonController extends Controller
{
    public function edit(Button $button)
    {
        return view('pages.components.buttonEdit', [
            'comp' => $button
        ]);
    }

    public function update(Request $request, Button $button)
    {
        $button->fill($request->all())->save();

        if($button->page != null)
            return to_route('pages.edit', $button->page);
        
        return to_route('projects.edit', $button->project);
    }

    public function destroy(Button $button)
    {
        $button->delete();

        if($button->page != null)
            return to_route('pages.edit', $button->page);
        
        return to_route('projects.edit', $button->project);
    }

    public function create(int $page)
    {
        $button = Button::factory()->create();
        $button->page_id = $page;
        $button->project_id = 0;
        $button->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $button = Button::factory()->create();
        $button->page_id = 0;
        $button->project_id = $project;
        $button->save();

        return to_route('projects.edit', $project);
    }
}
