<?php

namespace App\Http\Requests;

use App\Models\LeadFollowup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeadFollowupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_followup_edit');
    }

    public function rules()
    {
        return [
            'lead_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
