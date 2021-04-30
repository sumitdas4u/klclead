@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="lead_status_group_id">{{ trans('cruds.team.fields.lead_status_group') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_status_group') ? 'is-invalid' : '' }}" name="lead_status_group_id" id="lead_status_group_id">
                    @foreach($lead_status_groups as $id => $entry)
                        <option value="{{ $id }}" {{ old('lead_status_group_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_status_group'))
                    <span class="text-danger">{{ $errors->first('lead_status_group') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.lead_status_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_no">{{ trans('cruds.team.fields.contact_no') }}</label>
                <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', '') }}">
                @if($errors->has('contact_no'))
                    <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.contact_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person">{{ trans('cruds.team.fields.contact_person') }}</label>
                <input class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person', '') }}">
                @if($errors->has('contact_person'))
                    <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.team.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
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