<?php

namespace App\Http\Controllers\Components;

use App\Services\DefaultService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Components\Review;

class ReviewController extends Controller
{
    public function edit(Review $review)
    {
        return view('pages.components.reviewEdit', [
            'comp' => $review
        ]);
    }

    public function update(Request $request, Review $review, DefaultService $defaultService)
    {
        $review->fill($request->all())->save();

        $defaultService->updateImage($review, $request);

        if($review->page != null)
            return to_route('pages.edit', $review->page);
        
        return to_route('projects.edit', $review->project);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        if($review->page != null)
            return to_route('pages.edit', $review->page);
        
        return to_route('projects.edit', $review->project);
    }

    public function create(int $page)
    {
        $review = Review::factory()->create();
        $review->page_id = $page;
        $review->project_id = 0;
        $review->save();

        return to_route('pages.edit', $page);
    }

    public function createProject(int $project)
    {
        $review = Review::factory()->create();
        $review->page_id = 0;
        $review->project_id = $project;
        $review->save();

        return to_route('projects.edit', $project);
    }
}
