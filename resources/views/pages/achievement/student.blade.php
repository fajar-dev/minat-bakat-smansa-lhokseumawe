@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-3 mb-1">Prestasi</span>
        <span class="text-muted fw-semibold fs-7">prestasi Siswa</span>
      </h3>
    </div>
  </div>
  <div class="card-body table-responsive">
    <table class="table align-middle table-row-dashed table-striped fs-6 gy-5" id="table">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px ps-3">No</th>
          <th class="min-w-200px">Siswa</th>
          <th class="min-w-100px">Nama Kegiatan</th>
          <th class="min-w-100px">Tanggal Kegiatan</th>
          <th class="min-w-100px">Tipe Prestasi</th>
          <th class="min-w-100px">Nama Prestasi</th>
          <th class="min-w-100px">Bukti</th>
          <th class="text-end">Aksi</th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-800">
          @foreach ($achievement as $index => $item)     
          <tr>
            <td>
              <span class="text-gray-800 text-hover-primary  ps-3">{{ $index + 1 }}</span>
            </td>
            <td class="d-flex align-items-center min-w-150px">
              <div class="symbol-group symbol-hover me-3">
                <div class="symbol symbol-45px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->user->name }}">
                  <img src="{{ $item->user->photo_path ? Storage::url($item->user->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.$item->user->name}}" alt="">
                </div>
              </div>
              <div class="d-flex flex-column">
                <span class="text-gray-800 fw-bold mb-1">{{ $item->user->name }}</span>
                <span class="text-gray-600 fs-7">{{ $item->user->student_identity_number }}</span>
                <span class="text-gray-600 fs-7">{{ $item->user->class }} - {{ $item->user->major }}</span>

              </div>
            </td>
            <td class="pe-0">
              <span>{{ $item->activity_name }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->date }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->type }}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->achievement_name }}</span>
            </td>
            <td class="pe-0">
              <a href="{{ Storage::url($item->file_path) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
            </td>
            <td class="text-end">
              <button id="{{ route('achievement.destroy', $item->id) }}" class="btn btn-danger btn-sm btn-del">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@foreach ($achievement as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('achievement.update', $item->id) }}" class="modal-content" id="edit{{$item->id}}" enctype="multipart/form-data">
      @csrf
        <div class="modal-header">
            <h3 class="modal-title">Edit Prestasi</h3>
            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
        </div>
        <div class="modal-body">
          <div class="mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Nama Kegiatan</label>
            <input type="text" name="activity_name" class="form-control form-control-solid @error('activity_name') is-invalid @enderror"  value="{{ old('activity_name') ?? $item->activity_name }}" placeholder="Nama Kegiatan" required/>
            @error('activity_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Tanggal Kegiatan</label>
            <input type="date" name="date" class="form-control form-control-solid @error('date') is-invalid @enderror"  value="{{ old('date') ?? $item->date }}" placeholder="Nama" required/>
            @error('date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Tipe prestasi</label>
            <select name="type" class="form-select form-select-solid @error('type') is-invalid @enderror" data-control="select2" data-placeholder="Pilih Tipe Prestasi">
                <option value="Internasional" {{ (old('type') ?? $item->type) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                <option value="Nasional" {{ (old('type') ?? $item->type) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                <option value="Kabupaten/Kota" {{ (old('type') ?? $item->type) == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                <option value="Kecamatan" {{ (old('type') ?? $item->type) == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                <option value="Kelurahan/Desa/Gampong" {{ (old('type') ?? $item->type) == 'Kelurahan/Desa/Gampong' ? 'selected' : '' }}>Kelurahan/Desa/Gampong</option>
            </select>
            @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Nama Penghargaan/Prestasi</label>
            <input type="text" name="achievement_name" class="form-control form-control-solid @error('achievement_name') is-invalid @enderror"  value="{{ old('achievement_name') ?? $item->achievement_name }}" placeholder="Nama Penghargaan/Prestasi" required/>
            @error('achievement_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="exampleFormControlInput1" class="form-label">Bukti</label>
            <input type="file" name="file_path" class="form-control form-control-solid @error('file_path') is-invalid @enderror"  value="{{ old('file_path') }}"/>
            <div class="form-text">Allowed file types: png, jpg, jpeg. Max: 2mb</div>
            @error('file_path')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="submit{{$item->id}}">
              <span class="indicator-label">Simpan</span>
              <span class="indicator-progress" style="display: none;">Loading... 
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
  </div>
</div>
@endforeach

@endsection
@section('script')
<script>
  document.querySelectorAll('form').forEach(function(form) {
    form.addEventListener('submit', function(event) {
      var submitButton = form.querySelector('button[type="submit"]');
      submitButton.querySelector('.indicator-label').style.display = 'none';
      submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
      submitButton.setAttribute('disabled', 'disabled');
    });
  });
</script>
<script>
  document.getElementById('form').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
  $("#table").DataTable();
</script>
@endsection