<?php

namespace App\Http\Controllers;

use App\Models\CourseItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CourseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseItem $courseItem)
    {
        $category = $courseItem->category;
        $videos = $courseItem->videos;
        $user = Auth::user();
        $hasAccess = $user->courses()->where('course_item_id', $courseItem->id)->exists();
        return view('course-item.detail', compact('courseItem', 'category', 'videos', 'user', 'hasAccess'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseItem $courseItem): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseItem $courseItem): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseItem $courseItem): RedirectResponse
    {
        //
    }
}
