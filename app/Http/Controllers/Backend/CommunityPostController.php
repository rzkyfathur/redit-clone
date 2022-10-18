<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Community;
use App\Models\Post;
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


    public function edit(Community $community, Post $post)
    {
        return Inertia::render('Communities/Posts/Edit', compact('community', 'post'));
    }


    public function update(StorePostRequest $request, Community $community, Post $post)
    {
        $post->update($request->validated());

        return redirect::route('frontend.communities.show', $community->slug);
    }

    public function destroy(Community $community, Post $post)
    {
        $post->delete();
        return redirect::route('frontend.communities.show', $community->slug);
    }
}
