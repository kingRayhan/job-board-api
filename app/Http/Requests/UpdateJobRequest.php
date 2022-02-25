<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['string', 'required'],
            'location' => ['string', 'required'],
            'link' => ['string', 'url', 'required'],
            'company_name' => ['string', 'required'],
            'description' => ['string', 'nullable'],
            'company_logo' => ['required', 'url'],
            'type' => ['required', 'string',
                Rule::in([
                    'full_time',
                    'part_time',
                    'contract',
                    'temporary',
                    'internship',
                    'volunteer',
                    'remote'
                ])
            ],
            'tags' => ['array', Rule::exists('tags', 'id')]
        ];
    }
}
