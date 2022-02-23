<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobListResouce;
use App\Models\Job;

/**
 * @group Jobs
 * Apis for job listing
 */
class JobController extends Controller
{
    /**
     * Add a word to the list.
     *
     * This endpoint allows you to add a word to the list.
     * It's a really useful endpoint, and you should play around
     * with it for a bit.
     * <aside class="notice">We mean it; you really should.😕</aside>
     *
     * @queryParam limit int How many resource to show per page. `Default: 10`
     * @queryParam user_id uuid Filtered jobs posted by a particular user.
     */
    public function index()
    {
        $jobs = Job::with('user')->whereHas('user', function ($query){
            if(request()->has('user_id')){
                return $query->where('id', request()->get('user_id'));
            }
        })
            ->orderBy('pinned', 'desc')
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(request()->get('limit', 10));

        return JobListResouce::collection($jobs);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
