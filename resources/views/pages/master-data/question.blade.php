@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-body table-responsive">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed table-striped fs-6 gy-5" id="table">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px ps-3">No</th>
          <th class="min-w-200px">Pertanyaan</th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-800">
        @foreach ($question as $item)
          <tr>
            <td>
              <span class="ps-3">{{ $item->id }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->text }}</span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
  $("#table").DataTable();
</script>
@endsection