<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\CourseItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CourseCategoryController extends Controller
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
    public function show(CourseCategory $courseCategory)
    {

        $items = CourseItem::where('course_category_id', $courseCategory->id)->with('category')->withCount('videos')->get();
        $user = Auth::user();
        $courses = $user->courses()->where('course_category_id', $courseCategory->id)->with('category')->withCount('videos')->get();
        return view('course-category.detail', compact('courseCategory', 'items', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $courseCategory): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseCategory $courseCategory): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $courseCategory): RedirectResponse
    {
        //
    }
}
