<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'location' => $this->location,
            'link' => $this->link,
            'company' => [
                'name' => $this->company_name,
                'logo' => $this->company_logo
            ],
            'user' => new UserPublicResource($this->user),
            'tags' => TagPublicResource::collection($this->tags),
            'highlighted' => $this->highlighted,
            'pinned' => $this->pinned,
            'type' => $this->type,
            'description' => $this->description,
            'timestamp' => [
                'created' => $this->created_at,
                'updated' => $this->updated_at,
            ]
        ];
    }
}
