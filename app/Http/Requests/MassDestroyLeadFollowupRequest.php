<?php

namespace App\Http\Requests;

use App\Models\LeadFollowup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLeadFollowupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lead_followup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lead_followups,id',
        ];
    }
}
