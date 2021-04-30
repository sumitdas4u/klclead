<?php

namespace App\Http\Requests;

use App\Models\LeadStatusGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeadStatusGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_status_group_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:lead_status_groups',
            ],
            'statuses.*' => [
                'integer',
            ],
            'statuses' => [
                'required',
                'array',
            ],
        ];
    }
}
