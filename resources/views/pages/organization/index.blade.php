@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-3 mb-1">Ekstrakulikuler</span>
        <span class="text-muted fw-semibold fs-7">Ekstrakulikuler yang saya pilih</span>
      </h3>
    </div>
    <div class="card-toolbar">
      <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary d-flex align-items-center"><i class="ki-duotone ki-plus fs-2"></i>
        Tambah
      </button>
      <div class="modal fade" tabindex="-1" id="add">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('organization.store') }}" class="modal-content" id="form">
              @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Ekstrakulikuler</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">              
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Ekstrakulikuler</label>
                    <select class="form-select form-select-solid @error('organization_id') is-invalid @enderror" name="organization_id" data-control="select2" data-placeholder="Pilih Ekstrakulikuler">
                      <option></option>
                      @foreach ($ekstrakulikuler as $organizations)
                        <option value="{{ $organizations->id }}" {{ old('organization_id') == $organizations->id ? 'selected' : '' }}>
                          {{ $organizations->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('organization_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>              
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Alasan</label>
                    <textarea name="reason" class="form-control form-control-solid @error('reason') is-invalid @enderror"  placeholder="reason" required/>{{ old('reason') }}</textarea>
                    @error('reason')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="submit" class="btn btn-primary">
                      <span class="indicator-label">Submit</span>
                      <span class="indicator-progress" style="display: none;">Loading... 
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body pt-0">
    <div class="table-responsive">
      <table id="table" class="table table-row-dashed table-striped fs-6 gy-5">
        <thead>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-20px">NO</th>
            <th class="min-w-50px">Ekstrakulikuler</th>
            <th class="min-w-100px">Alasan</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody class="fw-semibold text-gray-800">
          @foreach ($organizationRegistration  as $index => $item)     
          <tr>
            <td>
              <span class="text-gray-800 fw-bold ps-3">{{ $index + 1 }}</span>
            </td>
            <td>
              <span>{{ $item->organization->name }}</span>
            </td>
            <td>
              <span>{{ $item->reason }}</span>
            </td>
            <td class="text-end">
              <button id="{{ route('organization.destroy', $item->id) }}" class="btn btn-danger btn-sm btn-del">Hapus</button>
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
<script>
  document.getElementById('form').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection
