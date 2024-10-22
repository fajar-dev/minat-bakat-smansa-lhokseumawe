@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-3 mb-1">Siswa</span>
        <span class="text-muted fw-semibold fs-7">Siswa Terdaftar</span>
      </h3>
    </div>
  </div>
  <div class="card-body pt-0">
    <div class="table-responsive">
      <table id="table" class="table table-row-dashed fs-6 gy-5">
        <thead>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-150px">Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th class="text-center">Status Tes</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody class="fw-semibold text-gray-800">
          @foreach ($student as $item)     
            <tr>
              <td class="d-flex align-items-center min-w-150px">
                <div class="symbol-group symbol-hover me-3">
                  <div class="symbol symbol-45px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->name }}">
                    <img src="{{ $item->photo_path ? Storage::url($item->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.$item->name}}" alt="">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="text-gray-800 fw-bold mb-1">{{ $item->name }}</span>
                  <span class="text-gray-600 fs-7">{{ $item->student_identity_number }}</span>
                </div>
              </td>
              <td>
                <span class="text-gray-800">{{ $item->class }}</span>
              </td>
              <td>
                <span class="text-gray-800">{{ $item->major }}</span>
              </td>
              <td class="text-center">
                @if ($item->assessment)
                  <span class="badge badge-light-success">Sudah</span>
                @else
                  <span class="badge badge-light-warning">Belum</span>
                @endif
              </td>
              <td class="pe-0 text-end">
                <div>
                  <button data-bs-toggle="modal" data-bs-target="#detail{{$item->id}}" class="btn btn-primary btn-sm">Detail</button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
  $("#table").DataTable();
</script>
@endsection
