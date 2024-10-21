{{-- @php
    dd($organization);
@endphp --}}
@extends('layouts.main')

@section('content')
  <div class="d-flex flex-column flex-root " style="background-image: url('{{ asset('assets/img/billboard-bg.png') }}')" id="kt_app_root">
    <div class="container">
      <div class="row">
        <div class="col-12 my-20">
          <div class="card card-flush">
            <div class="card-body">
              <div class="mb-10">
                <a href="{{route('home')}}" class="btn btn-light  btn-sm">
                  <i class="ki-duotone ki-black-left fs-1"></i>
                  Kembali ke beranda
                </a>
              </div>
              <div class="mb-10">
                <h1 class="fw-bold">Hasil Tes</h1>
                <span class="text-gray-700">Multiple Intelligences Score  (MIS)</span>
              </div>
              <div>
                <p class="fw-bold mb-1">Tanggal:</p>
                <span class="text-gray-600">{{ $result->created_at }}</span>

                <p class="fw-bold mb-1 mt-5">Nama:</p>
                <span class="text-gray-600">{{ $result->name }}</span>
            
                <p class="fw-bold mb-1 mt-5">Tipe Kecerdasan:</p>
                <span class="badge badge-primary">{{ $result->result->type }}</span>

                <p class="fw-bold mb-1 mt-5">Penjelasan:</p>
                <span class="text-gray-600">{{ $result->result->content }}</span>

                <p class="fw-bold mb-1 mt-5">Area Pengembangan:</p>
                <span class="text-gray-600">{{ $result->result->development_area }}</span>

                @if ($result->user_id)
                  <p class="fw-bold mb-1 mt-5">Rekomendasi Ekstrakulikuler:</p>
                    @foreach ($result->result->recomended as $organization)
                      <span class="badge badge-light">{{ $organization->organization->name}}</span>
                    @endforeach
                @endif
              </div>
              <div>
                <p class="fw-bold mb-1 mt-5">Jawaban Saya:</p>
                <div class="table-responsive">
                  <table class="table align-middle table-row-dashed table-bordered fs-6 gy-5" id="kt_ecommerce_sales_table">
                    <tbody class="fw-semibold text-gray-600">
                      <thead>
                        <tr class="fw-bold fs-6 text-gray-800">
                          <th>Pertanyaan</th>
                          <th class="text-center">Rangking</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($result->answer as $item)
                        <tr>
                          <td class="py-2 my-0">{{ $item->question->text }}</td>
                          <td class="py-2 my-0 text-center">{{ $item->value }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          @if ($result->user_id)
            <div class="card card-flush mt-5">
              <div class="card-body">
                <div class="mb-10 d-flex justify-content-between">
                  <div>
                    <h1 class="fw-bold">Daftar Ekstrakulikuler</h1>
                    <span class="text-gray-700">Daftarkan dirimu ke ekstrakulikuler pilihan kamu</span>
                  </div>
                  <div>
                    <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary">Daftar</button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="fw-bold fs-6 text-gray-800">
                        <th>Ekstrakulikuler</th>
                        <th>Alasan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($organizationRegistration->isEmpty())
                        <tr>
                          <td colspan="3" class="text-center">No data available</td>
                        </tr>
                      @else
                        @foreach ($organizationRegistration as $item)
                        <tr>
                          <td>{{ $item->organization->name }}</td>
                          <td>{{ $item->reason }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                            <button id="{{ route('organization.destroy', $item->id) }}" class="btn btn-danger btn-sm btn-del">Hapus</button>
                          </td>
                        </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>                  
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" id="add">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('organization.store') }}" class="modal-content" id="form">
          @csrf
            <div class="modal-header">
                <h3 class="modal-title">Daftar Ekstrakulikuler</h3>
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
                  <span class="indicator-label">Daftar</span>
                  <span class="indicator-progress" style="display: none;">Loading... 
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
  </div>
@endsection

@section('script')
<script>
  document.getElementById('form').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection

