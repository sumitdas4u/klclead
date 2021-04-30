@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lead.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leads.update", [$lead->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.lead.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $lead->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.lead.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $lead->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.lead.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $lead->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whatsapp_no">{{ trans('cruds.lead.fields.whatsapp_no') }}</label>
                <input class="form-control {{ $errors->has('whatsapp_no') ? 'is-invalid' : '' }}" type="text" name="whatsapp_no" id="whatsapp_no" value="{{ old('whatsapp_no', $lead->whatsapp_no) }}">
                @if($errors->has('whatsapp_no'))
                    <span class="text-danger">{{ $errors->first('whatsapp_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.whatsapp_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alternative_number">{{ trans('cruds.lead.fields.alternative_number') }}</label>
                <input class="form-control {{ $errors->has('alternative_number') ? 'is-invalid' : '' }}" type="text" name="alternative_number" id="alternative_number" value="{{ old('alternative_number', $lead->alternative_number) }}">
                @if($errors->has('alternative_number'))
                    <span class="text-danger">{{ $errors->first('alternative_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.alternative_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="localtion">{{ trans('cruds.lead.fields.localtion') }}</label>
                <input class="form-control {{ $errors->has('localtion') ? 'is-invalid' : '' }}" type="text" name="localtion" id="localtion" value="{{ old('localtion', $lead->localtion) }}">
                @if($errors->has('localtion'))
                    <span class="text-danger">{{ $errors->first('localtion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.localtion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.lead.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $lead->address) }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="interest">{{ trans('cruds.lead.fields.interest') }}</label>
                <input class="form-control {{ $errors->has('interest') ? 'is-invalid' : '' }}" type="text" name="interest" id="interest" value="{{ old('interest', $lead->interest) }}">
                @if($errors->has('interest'))
                    <span class="text-danger">{{ $errors->first('interest') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.interest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.lead.fields.comment') }}</label>
                <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" type="text" name="comment" id="comment" value="{{ old('comment', $lead->comment) }}">
                @if($errors->has('comment'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="source">{{ trans('cruds.lead.fields.source') }}</label>
                <input class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" type="text" name="source" id="source" value="{{ old('source', $lead->source) }}">
                @if($errors->has('source'))
                    <span class="text-danger">{{ $errors->first('source') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="utm">{{ trans('cruds.lead.fields.utm') }}</label>
                <input class="form-control {{ $errors->has('utm') ? 'is-invalid' : '' }}" type="text" name="utm" id="utm" value="{{ old('utm', $lead->utm) }}">
                @if($errors->has('utm'))
                    <span class="text-danger">{{ $errors->first('utm') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.utm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="utm_campaign">{{ trans('cruds.lead.fields.utm_campaign') }}</label>
                <input class="form-control {{ $errors->has('utm_campaign') ? 'is-invalid' : '' }}" type="text" name="utm_campaign" id="utm_campaign" value="{{ old('utm_campaign', $lead->utm_campaign) }}">
                @if($errors->has('utm_campaign'))
                    <span class="text-danger">{{ $errors->first('utm_campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.utm_campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="utm_medium">{{ trans('cruds.lead.fields.utm_medium') }}</label>
                <input class="form-control {{ $errors->has('utm_medium') ? 'is-invalid' : '' }}" type="text" name="utm_medium" id="utm_medium" value="{{ old('utm_medium', $lead->utm_medium) }}">
                @if($errors->has('utm_medium'))
                    <span class="text-danger">{{ $errors->first('utm_medium') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.utm_medium_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip">{{ trans('cruds.lead.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', $lead->ip) }}">
                @if($errors->has('ip'))
                    <span class="text-danger">{{ $errors->first('ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="followup_date">{{ trans('cruds.lead.fields.followup_date') }}</label>
                <input class="form-control date {{ $errors->has('followup_date') ? 'is-invalid' : '' }}" type="text" name="followup_date" id="followup_date" value="{{ old('followup_date', $lead->followup_date) }}">
                @if($errors->has('followup_date'))
                    <span class="text-danger">{{ $errors->first('followup_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.followup_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_status_id">{{ trans('cruds.lead.fields.lead_status') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_status') ? 'is-invalid' : '' }}" name="lead_status_id" id="lead_status_id">
                    @foreach($lead_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lead_status_id') ? old('lead_status_id') : $lead->lead_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_status'))
                    <span class="text-danger">{{ $errors->first('lead_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.lead_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="assign_to_id">{{ trans('cruds.lead.fields.assign_to') }}</label>
                <select class="form-control select2 {{ $errors->has('assign_to') ? 'is-invalid' : '' }}" name="assign_to_id" id="assign_to_id">
                    @foreach($assign_tos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('assign_to_id') ? old('assign_to_id') : $lead->assign_to->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('assign_to'))
                    <span class="text-danger">{{ $errors->first('assign_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.assign_to_helper') }}</span>
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