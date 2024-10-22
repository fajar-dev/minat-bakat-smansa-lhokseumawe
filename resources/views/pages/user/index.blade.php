@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-3 mb-1">Admin</span>
        <span class="text-muted fw-semibold fs-7">Admin Management</span>
      </h3>
    </div>
    <div class="card-toolbar">
      <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary d-flex align-items-center"><i class="ki-duotone ki-plus fs-2"></i>
        Tambah
      </button>
      <div class="modal fade" tabindex="-1" id="add">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('user.store') }}" class="modal-content" id="form">
              @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Admin</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Nama</label>
                    <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Nama" required/>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Email" required/>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-5">
                    <label for="exampleFormControlInput1" class="required form-label">Password</label>
                    <input type="password" name="password" class="form-control form-control-solid"  value="{{ old('password') }}" placeholder="********" required/>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
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
  <div class="card-body pt-0">
    <div class="table-responsive">
      <table id="table" class="table table-row-dashed fs-6 gy-5">
        <thead>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th>Nama</th>
            <th>Role</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody class="fw-semibold text-gray-800">
          @foreach ($user as $item)     
            <tr>
              <td class="d-flex align-items-center min-w-150px">
                <div class="symbol-group symbol-hover me-3">
                  <div class="symbol symbol-45px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->name }}">
                    <img src="{{ $item->photo_path ? Storage::url($item->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.$item->name}}" alt="">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="text-gray-800 fw-bold mb-1">{{ $item->name }}</span>
                  <span class="text-gray-600 fs-7">{{ $item->email }}</span>
                </div>
              </td>
              <td>
                <span class="text-gray-800">{{ $item->role }}</span>
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
                    <a href="#"  data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}" class="menu-link px-3">Edit</a>
                  </div>
                  <div class="menu-item px-3">
                    <a id="{{ route('user.destroy', $item->id) }}" class="menu-link px-3 btn-del">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@foreach ($user as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('user.update', $item->id) }}" class="modal-content" id="formUpdate{{$item->id}}">
      @csrf
        <div class="modal-header">
            <h3 class="modal-title">Edit Admin</h3>
            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
        </div>
        <div class="modal-body">
          <div class="mb-5">
            <label for="name{{$item->id}}" class="required form-label">Nama</label>
            <input type="text" id="name{{$item->id}}" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" value="{{ $item->name }}" placeholder="Nama" required/>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="email{{$item->id}}" class="required form-label">Email</label>
            <input type="email" id="email{{$item->id}}" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{ $item->email }}" placeholder="Email" required/>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="password{{$item->id}}" class="form-label">Password</label>
            <input type="password" id="password{{$item->id}}" name="password" class="form-control form-control-solid" placeholder="********" />
            @error('password')
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

<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
  $("#table").DataTable();
</script>
@endsection
