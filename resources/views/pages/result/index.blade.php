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
    <div class="card-toolbar">
      <div class="d-flex">
        <form method="GET" class="me-5">
            <select class="form-select form-select-solid w-100 me-20" name="q" onchange="this.form.submit()">
                <option value="semua" {{ request('q') == 'semua' ? 'selected' : '' }}>Semua</option>
                <option value="siswa" {{ request('q') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="umum" {{ request('q') == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </form>
        <div>
          <a href="{{ route('result.export', ['q' => request('q', 'semua')]) }}" id="submit" class="btn btn-success">
            <span class="indicator-label">
              <div class="d-flex align-items-center">
                <i class="ki-duotone ki-file-down fs-3 pe-3">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
                Export
              </div>
            </span>
            <span class="indicator-progress" style="display: none;">Loading... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
          </a>
        </div>
    </div>
    </div>
  </div>
  <div class="card-body pt-0">
    <div class="table-responsive">
      <table id="table" class="table table-row-dashed table-striped fs-6 gy-5">
        <thead>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th>NO</th>
            <th>Nama Peserta</th>
            <th>Hobi/Aktivitas</th>
            <th>Tipe Kecerdasan</th>
            <th>Rekomendasi Ekstrakulikuler</th>
            <th>Pilihan Ekstrakulikuler</th>
            <th>Kategori Peserta</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="fw-semibold text-gray-800">
          @foreach ($assessment as $index => $item)     
            <tr>
              <td>
                <span class="text-gray-900 fw-bold ps-3">{{ $index + 1 }}</span>
              </td>
              <td class="pe-0">
                <span>{{ $item->name }}</span>
              </td>
              <td class="pe-0">
                <span>{{ $item->hobby }}</span>
              </td>
              <td class="pe-0">
                <span>{{ $item->result->type }}</span>
              </td>
              <td class="pe-0">
                @foreach ($item->result->recomended as $organization)
                  <span>{{ $organization->organization->name}}</span>,
                @endforeach
              </td>
              <td>
                @if ($item->user_id)
                  @if (!empty($item->user->organizatiionRegistration) && !$item->user->organizatiionRegistration->isEmpty())
                    @foreach ($item->user->organizatiionRegistration as $registration)
                      <span>{{ $registration->organization->name }}</span>,
                    @endforeach
                  @else
                    <span>-</span>
                  @endif
                @else
                  <span>-</span>
                @endif
              </td>
              <td>
                @if ($item->user_id)
                  <span class="badge badge-primary">Siswa</span>
                @else
                  <span class="badge badge-light-primary">Umum</span>
                @endif
              </td>
              <td class="pe-0">
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

@foreach ($assessment as $index => $item)     
<div class="modal fade" tabindex="-1" id="detail{{$item->id}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title">Detail Jawaban</h3>

              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
          </div>

          <div class="modal-body">
            {{-- @if ($item->user_id) --}}
                  {{-- @if (!empty($item->user->organizatiionRegistration) && !$item->user->organizatiionRegistration->isEmpty())
                    @foreach ($item->user->organizatiionRegistration as $registration)
                      <span>{{ $registration->organization->name }}</span>,
                    @endforeach
                  @else
                    <span>-</span>
                  @endif --}}
            {{-- @endif --}}
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
                    @foreach ($item->answer as $data)
                    <tr>
                      <td class="py-2 my-0">{{ $data->question->text }}</td>
                      <td class="py-2 my-0 text-center">{{ $data->value }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </tbody>
              </table>
            </div>
          </div>
      </div>
  </div>
</div>
@endforeach
@endsection

@section('script')
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
  $("#table").DataTable();
</script>

<script>
  document.getElementById('submit').addEventListener('click', function(event) {
    event.preventDefault();

    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');

    var downloadLink = document.createElement('a');
    downloadLink.href = submitButton.href;
    downloadLink.setAttribute('download', '');

    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);

    setTimeout(function() {
      submitButton.querySelector('.indicator-label').style.display = 'inline-block';
      submitButton.querySelector('.indicator-progress').style.display = 'none';
      submitButton.removeAttribute('disabled');
    }, 3000);
  });
</script>
@endsection