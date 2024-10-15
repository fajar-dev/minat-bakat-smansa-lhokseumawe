@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-body pt-0">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px">No</th>
          <th class="min-w-200px">Pertanyaan</th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-600">
        @foreach ($question as $item)
          <tr>
            <td>
              <span class="text-gray-800 text-hover-primary fw-bold">{{ $item->id }}</span>
            </td>
            <td class="pe-0">
              <span class="fw-bold">{{ $item->text }}</span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
