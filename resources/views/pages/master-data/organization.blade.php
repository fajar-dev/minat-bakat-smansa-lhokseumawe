@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-toolbar">
      <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary d-flex align-items-center"><i class="ki-duotone ki-plus fs-2"></i>
        Tambah
      </button>
      <div class="modal fade" tabindex="-1" id="add">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('master-data.organization.store') }}" class="modal-content" id="form">
              @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Ekstrakulikuler  </h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Kategori</label>
                    <select class="form-select form-select-solid @error('organization_category_id') is-invalid @enderror" name="organization_category_id" data-control="select2" data-placeholder="Pilih Kategori Bidang">
                      <option></option>
                      @foreach ($organization as $organization_category)
                        <option value="{{ $organization_category->id }}" {{ old('organization_category_id') == $organization_category->id ? 'selected' : '' }}>
                          {{ $organization_category->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('organization_category_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>     
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Kegiatan</label>
                    <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Nama Ekstrakulikuler" required/>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Pembina</label>
                    <div id="kt_docs_repeater_add">
                      <div class="form-group">
                          <div data-repeater-list="coach">
                            <div data-repeater-item>
                              <div class="form-group row align-items-center mt-3">
                                  <div class="col-md-5">
                                      <label class="form-label text-muted">Nama:</label>
                                      <input type="text" name="name" class="form-control form-control-solid mb-2 mb-md-0 w-100" placeholder="Nama Lengkap" />
                                  </div>
                                  <div class="col-md-5">
                                      <label class="form-label text-muted">Jabatan:</label>
                                      <input type="text" name="position" class="form-control form-control-solid mb-2 mb-md-0" placeholder="Jabatan / Golongan" />
                                  </div>
                                  <div class="col-md-2">
                                      <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger btn-icon mt-3 mt-md-8">
                                          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                      </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="form-group mt-5">
                          <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                              <i class="ki-duotone ki-plus fs-3"></i>
                              Tambah
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="submit" class="btn btn-primary">
                      <span class="indicator-label">Simpan</span>
                      <span class="indicator-progress" style="display: none;">Loading... 
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body table-responsive">
    <table class="table align-middle table-row-dashed table-striped fs-6 gy-5">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px ps-3">No</th>
          <th class="min-w-150px">Kegiatan</th>
          <th class="min-w-200px">Pembina</th>
          <th class="text-end">Aksi</th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-800">
        <?php 
          $no = 1; 
          $index = 1; // Inisialisasi variabel index untuk deret angka
        ?>
        <?php foreach ($organization as $org_category): ?>
          <tr>
            <td colspan="4">
              <span class="text-gray-900 ps-3 fw-bold"><?= chr(64 + $no++) ?>.</span>
              <span class="text-gray-900 ps-3 fw-bold"><?= $org_category->name ?></span>
            </td>
          </tr>
      
          <?php foreach ($org_category->organization as $org): ?>
            <tr>
              <td>
                <span class="ps-5"><?= $index++ ?></span> <!-- Menampilkan angka deret -->
              </td>
              <td class="pe-0">
                <span><?= $org->name ?></span>
              </td>
              <td class="pe-0">
                <span>
                  <?php 
                    $coaches = json_decode($org->coach, true);
                    if (is_array($coaches) && !empty($coaches)) {
                        foreach ($coaches as $coach) {
                            echo $coach['name'] . ' (' . $coach['position'] . ')<br>';
                        }
                    } else {
                        echo ''; 
                    }
                  ?>
                </span>
              </td>
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center text-gray-700" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                  Aksi
                  <span class="svg-icon fs-5 m-0 ps-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                      </g>
                    </svg>
                  </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <div class="menu-item px-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{$org->id}}" class="menu-link px-3">Edit</a>
                  </div>
                  <div class="menu-item px-3">
                    <a id="{{ route('master-data.organization.destroy', $org->id) }}" class="menu-link px-3 btn-del">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
      
    </table>    
  </div>
</div>

@foreach ($organizations as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('master-data.organization.update', $item->id) }}" class="modal-content" id="formUpdate{{$item->id}}">
      @csrf
        <div class="modal-header">
            <h3 class="modal-title">Edit Ekstrakulikuler</h3>
            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
        </div>
        <div class="modal-body">
          <div class="mb-5">
            <label for="name{{$item->id}}" class="required form-label">Kegiatan</label>
            <input type="text" id="name{{$item->id}}" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" value="{{ $item->name }}" placeholder="Nama" required/>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="email{{$item->id}}" class="required form-label">Pembina</label>
            <div id="kt_docs_repeater_basic{{$item->id}}">
                <div class="form-group">
                    <div data-repeater-list="coach">
                        @if(!empty($item->coach))
                            @foreach($item->coach as $coach)
                                <div data-repeater-item>
                                    <div class="form-group row align-items-center mt-3">
                                        <div class="col-md-5">
                                            <label class="form-label text-muted">Nama:</label>
                                            <input type="text" name="name" class="form-control form-control-solid mb-2 mb-md-0 w-100" placeholder="Nama Lengkap" value="{{ $coach['name'] }}" />
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label text-muted">Jabatan:</label>
                                            <input type="text" name="position" class="form-control form-control-solid mb-2 mb-md-0" placeholder="Jabatan / Golongan" value="{{ $coach['position'] }}" />
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger btn-icon mt-3 mt-md-8">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div data-repeater-item>
                                <div class="form-group row align-items-center mt-3">
                                    <div class="col-md-5">
                                        <label class="form-label text-muted">Nama:</label>
                                        <input type="text" name="name" class="form-control form-control-solid mb-2 mb-md-0 w-100" placeholder="Nama Lengkap" />
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label text-muted">Jabatan:</label>
                                        <input type="text" name="position" class="form-control form-control-solid mb-2 mb-md-0" placeholder="Jabatan / Golongan" />
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger btn-icon mt-3 mt-md-8">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            
                <div class="mt-5">
                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                        <i class="ki-duotone ki-plus fs-3"></i> Tambah
                    </a>
                </div>
            </div>
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
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

@foreach ($organizations as $item)
<script>
  $('#kt_docs_repeater_basic{{$item->id}}').repeater({
    initEmpty: false,

    defaultValues: {
        'text-input': 'foo'
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
  });
</script>
@endforeach
<script>
  $('#kt_docs_repeater_add').repeater({
    initEmpty: false,

    defaultValues: {
        'text-input': 'foo'
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});
</script>
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
@endsection