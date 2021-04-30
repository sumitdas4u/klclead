<?php

namespace App\Http\Requests;

use App\Models\LeadStatusGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeadStatusGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_status_group_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:lead_status_groups,name,' . request()->route('lead_status_group')->id,
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
