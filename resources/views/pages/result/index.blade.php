@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-3 mb-1">Hasil</span>
        <span class="text-muted fw-semibold fs-7">Hasil Assessment</span>
      </h3>
    </div>
  </div>
  <div class="card-body pt-0">
    <div class="table-responsive">
      <table id="table" class="table table-row-dashed fs-6 gy-5">
        <thead>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th>NO</th>
            <th>Nama Peserta</th>
            <th>Hobi/Aktivitas</th>
            <th>Tipe Kecerdasan</th>
            <th>Rekomendasi Ekstrakulikuler</th>
            <th>Pilihan Ekstrakulikuler</th>
            <th>Kategori Peserta</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($assessment as $index => $item)     
            <tr>
              <td>
                <span class="text-gray-800 text-hover-primary fw-bold ps-3">{{ $index + 1 }}</span>
              </td>
              <td class="pe-0">
                <span class="text-gray-700">{{ $item->name }}</span>
              </td>
              <td class="pe-0">
                <span class="text-gray-700">{{ $item->hobby }}</span>
              </td>
              <td class="pe-0">
                <span class="text-gray-700">{{ $item->result->type }}</span>
              </td>
              <td class="pe-0">
                @foreach ($item->result->recomended as $organization)
                  <span class="text-gray-700">{{ $organization->organization->name}}</span>,
                @endforeach
              </td>
              <td>
                @if ($item->user_id)
                  @if (!empty($item->user->organizatiionRegistration) && !$item->user->organizatiionRegistration->isEmpty())
                    @foreach ($item->user->organizatiionRegistration as $registration)
                      <span class="text-gray-700">{{ $registration->organization->name }}</span>,
                    @endforeach
                  @else
                    <span class="text-gray-700">-</span>
                  @endif
                @else
                  <span class="text-gray-700">-</span>
                @endif
              </td>
              <td>
                @if ($item->user_id)
                  <span class="badge badge-primary">Siswa</span>
                @else
                  <span class="badge badge-light-primary">Umum</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
  </div>
</div>
@endsection