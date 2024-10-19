@extends('layouts.main')

@section('content')
  <div class="d-flex flex-column flex-root " style="background-image: url('{{ asset('assets/img/billboard-bg.png') }}')" id="kt_app_root">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card card-flush my-20">
            <div class="card-body">
              <div class="mb-10">
                <a href="{{route('home')}}" class="btn btn-light  btn-sm">
                  <i class="ki-duotone ki-black-left fs-1"></i>
                  Kembali
                </a>
              </div>
              <div class="mb-10">
                <h1 class="fw-bold">Hasil Tes</h1>
                <span class="text-gray-700">Multiple Intelligences Score  (MIS)</span>
              </div>
              <div>
                <p class="fw-bold mb-1">Nama:</p>
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
        </div>
      </div>
    </div>
  </div>
@endsection

