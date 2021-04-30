<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadFollowupRequest;
use App\Http\Requests\UpdateLeadFollowupRequest;
use App\Http\Resources\Admin\LeadFollowupResource;
use App\Models\LeadFollowup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadFollowupsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_followup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadFollowupResource(LeadFollowup::with(['user', 'lead_status'])->get());
    }

    public function store(StoreLeadFollowupRequest $request)
    {
        $leadFollowup = LeadFollowup::create($request->all());

        return (new LeadFollowupResource($leadFollowup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LeadFollowup $leadFollowup)
    {
        abort_if(Gate::denies('lead_followup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadFollowupResource($leadFollowup->load(['user', 'lead_status']));
    }

    public function update(UpdateLeadFollowupRequest $request, LeadFollowup $leadFollowup)
    {
        $leadFollowup->update($request->all());

        return (new LeadFollowupResource($leadFollowup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LeadFollowup $leadFollowup)
    {
        abort_if(Gate::denies('lead_followup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadFollowup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
