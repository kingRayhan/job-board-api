<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobDetailsResource;
use App\Http\Resources\JobListResouce;
use App\Models\Job;
use http\Env\Response;
use Illuminate\Validation\Rule;

/**
 * @group Jobs
 * Apis for job listing
 */
class JobController extends Controller
{
    /**
     * List of jobs
     *
     * @queryParam limit int - How many resource to show per page. `Default: 10`
     * @queryParam user_id string - Filtered jobs posted by a particular user.
     * @queryParam page int - Page number
     */
    public function index()
    {
        request()->validate([
           'user_id' => ['uuid', Rule::exists('users', 'id'), 'nullable']
        ]);

        $jobs = Job::with(['user', 'tags'])->whereHas('user', function ($query){
            if(request()->get('user_id')){
                return $query->where('id', request()->get('user_id'));
            }
        })
            ->orderBy('pinned', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(request()->get('limit', 10));
        return JobListResouce::collection($jobs);
    }


    /**
     * Post job
     *
     * Store a newly created resource in storage.
     *
     * @authenticated
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $job = auth()->user()->jobs()->create($request->except('user_id'));

        if($request->get('tags')){
            $job->tags()->sync($request->tags);
        }

        return response()->noContent();
    }

    /**
     * Job Details
     *
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return JobDetailsResource
     */
    public function show(Job $job)
    {
        return new JobDetailsResource($job);
    }

    /**
     * Update job
     *
     * Update the specified resource in storage.
     *
     * @authenticated
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $this->authorize('update', $job);

        $job->update($request->all());

        if($request->get('tags')){
            $job->tags()->sync($request->tags);
        }

        return response()->noContent()->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_ACCEPTED);
    }

    /**
     * Delete job
     *
     * Remove the specified resource from storage.
     * @authenticated
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->deleteOrFail();
        return response()->noContent()->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_ACCEPTED);
    }
}
