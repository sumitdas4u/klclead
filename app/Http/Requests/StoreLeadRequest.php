<?php

namespace App\Http\Requests;

use App\Models\Lead;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'whatsapp_no' => [
                'string',
                'nullable',
            ],
            'alternative_number' => [
                'string',
                'nullable',
            ],
            'localtion' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'interest' => [
                'string',
                'nullable',
            ],
            'comment' => [
                'string',
                'nullable',
            ],
            'source' => [
                'string',
                'nullable',
            ],
            'utm' => [
                'string',
                'nullable',
            ],
            'utm_campaign' => [
                'string',
                'nullable',
            ],
            'utm_medium' => [
                'string',
                'nullable',
            ],
            'ip' => [
                'string',
                'nullable',
            ],
            'followup_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
