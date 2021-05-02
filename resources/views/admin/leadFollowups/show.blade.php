@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.leadFollowup.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lead-followups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.id') }}
                        </th>
                        <td>
                            {{ $leadFollowup->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.user') }}
                        </th>
                        <td>
                            {{ $leadFollowup->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.lead_status') }}
                        </th>
                        <td>
                            {{ $leadFollowup->lead_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.comments') }}
                        </th>
                        <td>
                            {{ $leadFollowup->comments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.lead') }}
                        </th>
                        <td>
                            {{ $leadFollowup->lead->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lead-followups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection