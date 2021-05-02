@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.leadFollowup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lead-followups.update", [$leadFollowup->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.leadFollowup.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $leadFollowup->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.leadFollowup.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_status_id">{{ trans('cruds.leadFollowup.fields.lead_status') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_status') ? 'is-invalid' : '' }}" name="lead_status_id" id="lead_status_id">
                    @foreach($lead_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lead_status_id') ? old('lead_status_id') : $leadFollowup->lead_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_status'))
                    <span class="text-danger">{{ $errors->first('lead_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.leadFollowup.fields.lead_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.leadFollowup.fields.comments') }}</label>
                <textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{{ old('comments', $leadFollowup->comments) }}</textarea>
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.leadFollowup.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lead_id">{{ trans('cruds.leadFollowup.fields.lead') }}</label>
                <select class="form-control select2 {{ $errors->has('lead') ? 'is-invalid' : '' }}" name="lead_id" id="lead_id" required>
                    @foreach($leads as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lead_id') ? old('lead_id') : $leadFollowup->lead->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead'))
                    <span class="text-danger">{{ $errors->first('lead') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.leadFollowup.fields.lead_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection