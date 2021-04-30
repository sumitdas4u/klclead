<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadStatusGroupRequest;
use App\Http\Requests\UpdateLeadStatusGroupRequest;
use App\Http\Resources\Admin\LeadStatusGroupResource;
use App\Models\LeadStatusGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadStatusGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_status_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadStatusGroupResource(LeadStatusGroup::with(['statuses'])->get());
    }

    public function store(StoreLeadStatusGroupRequest $request)
    {
        $leadStatusGroup = LeadStatusGroup::create($request->all());
        $leadStatusGroup->statuses()->sync($request->input('statuses', []));

        return (new LeadStatusGroupResource($leadStatusGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LeadStatusGroup $leadStatusGroup)
    {
        abort_if(Gate::denies('lead_status_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadStatusGroupResource($leadStatusGroup->load(['statuses']));
    }

    public function update(UpdateLeadStatusGroupRequest $request, LeadStatusGroup $leadStatusGroup)
    {
        $leadStatusGroup->update($request->all());
        $leadStatusGroup->statuses()->sync($request->input('statuses', []));

        return (new LeadStatusGroupResource($leadStatusGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LeadStatusGroup $leadStatusGroup)
    {
        abort_if(Gate::denies('lead_status_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatusGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
