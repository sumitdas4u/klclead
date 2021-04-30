@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lead.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.leads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.id') }}
                        </th>
                        <td>
                            {{ $lead->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.name') }}
                        </th>
                        <td>
                            {{ $lead->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.email') }}
                        </th>
                        <td>
                            {{ $lead->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.phone') }}
                        </th>
                        <td>
                            {{ $lead->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.whatsapp_no') }}
                        </th>
                        <td>
                            {{ $lead->whatsapp_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.alternative_number') }}
                        </th>
                        <td>
                            {{ $lead->alternative_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.localtion') }}
                        </th>
                        <td>
                            {{ $lead->localtion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.address') }}
                        </th>
                        <td>
                            {{ $lead->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.interest') }}
                        </th>
                        <td>
                            {{ $lead->interest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.comment') }}
                        </th>
                        <td>
                            {{ $lead->comment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.source') }}
                        </th>
                        <td>
                            {{ $lead->source }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.utm') }}
                        </th>
                        <td>
                            {{ $lead->utm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.utm_campaign') }}
                        </th>
                        <td>
                            {{ $lead->utm_campaign }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.utm_medium') }}
                        </th>
                        <td>
                            {{ $lead->utm_medium }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.ip') }}
                        </th>
                        <td>
                            {{ $lead->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.followup_date') }}
                        </th>
                        <td>
                            {{ $lead->followup_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.lead_status') }}
                        </th>
                        <td>
                            {{ $lead->lead_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lead.fields.assign_to') }}
                        </th>
                        <td>
                            {{ $lead->assign_to->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.leads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection