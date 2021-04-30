<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        return [
            'contact_no' => [
                'string',
                'nullable',
            ],
            'contact_person' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
