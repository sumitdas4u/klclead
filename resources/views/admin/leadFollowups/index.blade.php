@extends('layouts.admin')
@section('content')
@can('lead_followup_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.lead-followups.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.leadFollowup.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.leadFollowup.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LeadFollowup">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.lead_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.comments') }}
                        </th>
                        <th>
                            {{ trans('cruds.leadFollowup.fields.lead') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leadFollowups as $key => $leadFollowup)
                        <tr data-entry-id="{{ $leadFollowup->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $leadFollowup->id ?? '' }}
                            </td>
                            <td>
                                {{ $leadFollowup->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $leadFollowup->lead_status->name ?? '' }}
                            </td>
                            <td>
                                {{ $leadFollowup->comments ?? '' }}
                            </td>
                            <td>
                                {{ $leadFollowup->lead->name ?? '' }}
                            </td>
                            <td>
                                {{ $leadFollowup->lead->name ?? '' }}
                            </td>
                            <td>
                                @can('lead_followup_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.lead-followups.show', $leadFollowup->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('lead_followup_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.lead-followups.edit', $leadFollowup->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('lead_followup_delete')
                                    <form action="{{ route('admin.lead-followups.destroy', $leadFollowup->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('lead_followup_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lead-followups.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-LeadFollowup:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection