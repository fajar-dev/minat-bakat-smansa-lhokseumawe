@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-body table-responsive">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed table-striped fs-6 gy-5" id="kt_ecommerce_sales_table">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px ps-3">No</th>
          <th class="min-w-100px">Tipe</th>
          <th class="min-w-200px">Penjelasan</th>
          <th class="min-w-100px">Area Pengembangan</th>
          <th class="min-w-100px">Rekomendasi Ekstrakulikuler</th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-800">
        @foreach ($type as $item)
          <tr>
            <td>
              <span class="text-gray-800 text-hover-primary  ps-3">{{ $item->id }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->type }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->content }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->development_area }}</span>
            </td>
            <td class="pe-0">
              @foreach ($item->recomended as $data)
              <span class="badge badge-secondary">{{ $data->organization->name }}</span>
              @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
