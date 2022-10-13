<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class CommunityPostController extends Controller
{
    public function create(Community $community)
    {
        return inertia::render('Communities/Posts/Create', compact('community'));
    }


    public function store(StorePostRequest $request, Community $community)
    {
        $community->posts()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url
        ]);

        return Redirect::route('frontend.communities.show', $community->slug);
    }
}
