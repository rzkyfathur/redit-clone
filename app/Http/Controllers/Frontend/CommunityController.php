<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug)
    {
        $community = Community::where('slug', $slug)->first();
        $posts = CommunityPostResource::collection($community->posts()->with('user')->paginate(3));
        return inertia::render('Frontend/Communities/Show', compact('community', 'posts'));
    }
}
