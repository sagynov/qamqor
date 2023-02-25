<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseItem;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        if($q){
            $results = CourseItem::where('title', 'LIKE', '%'.$q.'%')->orWhere('description', 'LIKE', '%'.$q.'%')->get();
            return view('search', compact('q', 'results'));
        }
        
        return redirect()->back();
    }
}
