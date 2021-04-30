@extends('layouts.admin')
@section('content')
@can('lead_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.leads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.lead.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Lead', 'route' => 'admin.leads.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lead.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Lead">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.whatsapp_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.alternative_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.localtion') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.interest') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.comment') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.source') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.utm') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.utm_campaign') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.utm_medium') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.ip') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.followup_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.lead_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.lead.fields.assign_to') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('lead_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.leads.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.leads.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'whatsapp_no', name: 'whatsapp_no' },
{ data: 'alternative_number', name: 'alternative_number' },
{ data: 'localtion', name: 'localtion' },
{ data: 'address', name: 'address' },
{ data: 'interest', name: 'interest' },
{ data: 'comment', name: 'comment' },
{ data: 'source', name: 'source' },
{ data: 'utm', name: 'utm' },
{ data: 'utm_campaign', name: 'utm_campaign' },
{ data: 'utm_medium', name: 'utm_medium' },
{ data: 'ip', name: 'ip' },
{ data: 'followup_date', name: 'followup_date' },
{ data: 'lead_status_name', name: 'lead_status.name' },
{ data: 'assign_to_name', name: 'assign_to.name' },
{ data: 'assign_to.email', name: 'assign_to.email' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Lead').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection