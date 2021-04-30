<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeadStatusGroupRequest;
use App\Http\Requests\StoreLeadStatusGroupRequest;
use App\Http\Requests\UpdateLeadStatusGroupRequest;
use App\Models\LeadStatus;
use App\Models\LeadStatusGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadStatusGroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_status_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatusGroups = LeadStatusGroup::with(['statuses'])->get();

        return view('admin.leadStatusGroups.index', compact('leadStatusGroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('lead_status_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = LeadStatus::all()->pluck('name', 'id');

        return view('admin.leadStatusGroups.create', compact('statuses'));
    }

    public function store(StoreLeadStatusGroupRequest $request)
    {
        $leadStatusGroup = LeadStatusGroup::create($request->all());
        $leadStatusGroup->statuses()->sync($request->input('statuses', []));

        return redirect()->route('admin.lead-status-groups.index');
    }

    public function edit(LeadStatusGroup $leadStatusGroup)
    {
        abort_if(Gate::denies('lead_status_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = LeadStatus::all()->pluck('name', 'id');

        $leadStatusGroup->load('statuses');

        return view('admin.leadStatusGroups.edit', compact('statuses', 'leadStatusGroup'));
    }

    public function update(UpdateLeadStatusGroupRequest $request, LeadStatusGroup $leadStatusGroup)
    {
        $leadStatusGroup->update($request->all());
        $leadStatusGroup->statuses()->sync($request->input('statuses', []));

        return redirect()->route('admin.lead-status-groups.index');
    }

    public function show(LeadStatusGroup $leadStatusGroup)
    {
        abort_if(Gate::denies('lead_status_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatusGroup->load('statuses');

        return view('admin.leadStatusGroups.show', compact('leadStatusGroup'));
    }

    public function destroy(LeadStatusGroup $leadStatusGroup)
    {
        abort_if(Gate::denies('lead_status_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatusGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadStatusGroupRequest $request)
    {
        LeadStatusGroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
