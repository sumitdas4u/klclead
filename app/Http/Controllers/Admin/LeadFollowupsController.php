<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeadFollowupRequest;
use App\Http\Requests\StoreLeadFollowupRequest;
use App\Http\Requests\UpdateLeadFollowupRequest;
use App\Models\Lead;
use App\Models\LeadFollowup;
use App\Models\LeadStatus;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadFollowupsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_followup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadFollowups = LeadFollowup::with(['user', 'lead_status', 'lead'])->get();

        return view('admin.leadFollowups.index', compact('leadFollowups'));
    }

    public function create()
    {
        abort_if(Gate::denies('lead_followup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_statuses = LeadStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.leadFollowups.create', compact('users', 'lead_statuses', 'leads'));
    }

    public function store(StoreLeadFollowupRequest $request)
    {
        $leadFollowup = LeadFollowup::create($request->all());

        return redirect()->route('admin.lead-followups.index');
    }

    public function edit(LeadFollowup $leadFollowup)
    {
        abort_if(Gate::denies('lead_followup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_statuses = LeadStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leadFollowup->load('user', 'lead_status', 'lead');

        return view('admin.leadFollowups.edit', compact('users', 'lead_statuses', 'leads', 'leadFollowup'));
    }

    public function update(UpdateLeadFollowupRequest $request, LeadFollowup $leadFollowup)
    {
        $leadFollowup->update($request->all());

        return redirect()->route('admin.lead-followups.index');
    }

    public function show(LeadFollowup $leadFollowup)
    {
        abort_if(Gate::denies('lead_followup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadFollowup->load('user', 'lead_status', 'lead');

        return view('admin.leadFollowups.show', compact('leadFollowup'));
    }

    public function destroy(LeadFollowup $leadFollowup)
    {
        abort_if(Gate::denies('lead_followup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadFollowup->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadFollowupRequest $request)
    {
        LeadFollowup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
