<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\JobListResouce;
use App\Http\Resources\TagPublicResource;
use App\Http\Resources\TagResouce;
use App\Models\Tag;

/**
 * @group Tag
 * Tag apis
 */

class TagController extends Controller
{
    /**
     * Tag List
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TagResouce::collection(Tag::all());
    }


    /**
     * Create tag
     *
     * Store a newly created resource in storage.
     *
     * @authenticated
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return TagResouce
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create($request->all());
        return new TagResouce($tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Jobs of a tag
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function jobs(Tag $tag)
    {
        return JobListResouce::collection($tag->jobs()->with(['tags', 'user'])->paginate(request()->get('limit', 10)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
