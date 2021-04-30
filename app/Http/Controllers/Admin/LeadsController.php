<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLeadRequest;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LeadsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('lead_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lead::with(['lead_status', 'assign_to', 'team'])->select(sprintf('%s.*', (new Lead())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'lead_show';
                $editGate = 'lead_edit';
                $deleteGate = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('whatsapp_no', function ($row) {
                return $row->whatsapp_no ? $row->whatsapp_no : '';
            });
            $table->editColumn('alternative_number', function ($row) {
                return $row->alternative_number ? $row->alternative_number : '';
            });
            $table->editColumn('localtion', function ($row) {
                return $row->localtion ? $row->localtion : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('interest', function ($row) {
                return $row->interest ? $row->interest : '';
            });
            $table->editColumn('comment', function ($row) {
                return $row->comment ? $row->comment : '';
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });
            $table->editColumn('utm', function ($row) {
                return $row->utm ? $row->utm : '';
            });
            $table->editColumn('utm_campaign', function ($row) {
                return $row->utm_campaign ? $row->utm_campaign : '';
            });
            $table->editColumn('utm_medium', function ($row) {
                return $row->utm_medium ? $row->utm_medium : '';
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : '';
            });

            $table->addColumn('lead_status_name', function ($row) {
                return $row->lead_status ? $row->lead_status->name : '';
            });

            $table->addColumn('assign_to_name', function ($row) {
                return $row->assign_to ? $row->assign_to->name : '';
            });

            $table->editColumn('assign_to.email', function ($row) {
                return $row->assign_to ? (is_string($row->assign_to) ? $row->assign_to : $row->assign_to->email) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'lead_status', 'assign_to']);

            return $table->make(true);
        }

        return view('admin.leads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead_statuses = LeadStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assign_tos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.leads.create', compact('lead_statuses', 'assign_tos'));
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = Lead::create($request->all());

        return redirect()->route('admin.leads.index');
    }

    public function edit(Lead $lead)
    {
        abort_if(Gate::denies('lead_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead_statuses = LeadStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assign_tos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead->load('lead_status', 'assign_to', 'team');

        return view('admin.leads.edit', compact('lead_statuses', 'assign_tos', 'lead'));
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $lead->update($request->all());

        return redirect()->route('admin.leads.index');
    }

    public function show(Lead $lead)
    {
        abort_if(Gate::denies('lead_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->load('lead_status', 'assign_to', 'team');

        return view('admin.leads.show', compact('lead'));
    }

    public function destroy(Lead $lead)
    {
        abort_if(Gate::denies('lead_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadRequest $request)
    {
        Lead::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
