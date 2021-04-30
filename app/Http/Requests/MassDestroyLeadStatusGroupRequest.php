<?php

namespace App\Http\Requests;

use App\Models\LeadStatusGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLeadStatusGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lead_status_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lead_status_groups,id',
        ];
    }
}
