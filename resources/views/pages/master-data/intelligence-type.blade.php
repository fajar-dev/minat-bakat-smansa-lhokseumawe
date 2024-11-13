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
          <th class="text-end">Aksi</th>
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
              <span>{!! $item->content !!}</span>
            </td>
            <td class="pe-0">
              <span>{{ $item->development_area }}</span>
            </td>
            <td class="pe-0">
              @foreach ($item->recomended as $data)
              <span class="badge badge-secondary">{{ $data->organization->name }}</span>
              @endforeach
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
                  <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}" class="menu-link px-3">Edit</a>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@foreach ($type as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('master-data.intelligence-type.update', $item->id) }}" class="modal-content" id="formUpdate{{$item->id}}">
      @csrf
        <div class="modal-header">
            <h3 class="modal-title">Edit Tipe Kecerdasan</h3>
            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
        </div>
        <div class="modal-body">
          <div class="mb-5">
            <label for="type{{$item->id}}" class="required form-label">Tipe</label>
            <input type="text" id="type{{$item->id}}" name="type" class="form-control form-control-solid @error('type') is-invalid @enderror" value="{{ $item->type }}" placeholder="Nama Tipe" required/>
            @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="content{{$item->id}}" class="required form-label">Penjelasan</label>
            <div data-bs-theme="light">
              <textarea name="content" id="kt_docs_ckeditor_classic{{$item->id}}">
                {!! $item->content !!}
              </textarea>
            </div>
            @error('content')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-5">
            <label for="type{{$item->id}}" class="required form-label">Area Pengembangan</label>
            <input type="text" id="development_area{{$item->id}}" name="development_area" class="form-control form-control-solid @error('development_area') is-invalid @enderror" value="{{ $item->development_area }}" placeholder="Nama Tipe" required/>
            @error('development_area')
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
<script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@foreach ($type as $item)
  <script>
    ClassicEditor
      .create(document.querySelector('#kt_docs_ckeditor_classic{{$item->id}}'), {
          toolbar: [
              'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'
          ],
          placeholder: 'Tulis penjelasan di sini...',
      })
      .then(editor => {
          console.log(editor);
      })
      .catch(error => {
          console.error(error);
      });
  </script>
@endforeach

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
@endsection