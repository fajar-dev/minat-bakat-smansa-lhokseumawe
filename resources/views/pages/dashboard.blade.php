@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'user')
  <div class="card mb-5 mb-xxl-8 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-size: auto 100%; background-image: url('https://preview.keenthemes.com/metronic8/demo4/assets/media/misc/taieri.svg')">
    <div class="card-body pt-6 pb-3">
      <div class="d-flex flex-wrap flex-sm-nowrap">
        <div class="me-7 mb-4">
          <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
            <img src="{{Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.Auth::user()->name}}" alt="image" />
            <div class="position-absolute mb-0 pb-0 translate-middle bottom-0 start-100 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
          </div>
        </div>
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
            <div class="d-flex flex-column">
              <div class="d-flex align-items-center mb-2">
                <div class="text-gray-900 fs-2 fw-bold me-1">{{Auth::user()->name}}</div>
              </div>
              <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                <span class="d-flex align-items-center text-gray-500 mb-2">
                {{Auth::user()->student_identity_number}}</span>
              </div>
            </div>
          </div>
          <div class="d-flex flex-wrap flex-stack">
            <div class="d-flex flex-column flex-grow-1 pe-8">
              <div class="d-flex flex-wrap">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <div class="d-flex align-items-center">
                    <div class="fs-2 fw-bold">{{Auth::user()->class}}</div>
                  </div>
                  <div class="fw-semibold fs-6 text-gray-500">Kelas</div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <div class="d-flex align-items-center">
                    <div class="fs-2 fw-bold">{{Auth::user()->major}}</div>
                  </div>
                  <div class="fw-semibold fs-6 text-gray-500">Jurusan</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
  <div class="card bgi-no-repeat bgi-position-x-end bgi-size-cover"  style="background-size: auto 100%; background-image: url('https://preview.keenthemes.com/metronic8/demo4/assets/media/misc/taieri.svg')">
    <div class="card-body pt-9 pb-0">
      <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
            <div class="d-flex flex-column">
              <div class="d-flex align-items-center mb-2">
                <a href="#" class="text-gray-900 text-hover-primary fs-1 fw-bolder me-1">Hi!, {{ Auth::user()->name}}
                </a>
              </div>
              <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                {{-- <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                  Semoga harimu menyenangkan
                </span> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif


@if (Auth::user()->role == 'user')
    @if ($myAssessment)
    <div class="card card-flush mt-10">
      <div class="card-body">
        <div class="mb-10 d-flex justify-content-between">
          <div>
            <h1 class="fw-bold">Hasil Tes</h1>
          </div>
          <div>
            <a href="{{ route('assessment.student') }}" class="btn btn-danger">Ulangi Tes</a>
          </div>
        </div>
        <div>
          <p class="fw-bold mb-1">Tanggal:</p>
          <span class="text-gray-600">{{ $myAssessment->created_at }}</span>

          <p class="fw-bold mb-1 mt-5">Tipe Kecerdasan (Minat):</p>
          <span class="badge badge-primary">{{ $myAssessment->personality->type }}</span>

          <p class="fw-bold mb-1 mt-5">Penjelasan:</p>
          <span class="text-gray-600">{!! $myAssessment->personality->content !!}</span>
      
          <p class="fw-bold mb-1 mt-5">Tipe Kecerdasan (Bakat):</p>
          <span class="badge badge-primary">{{ $myAssessment->intelligence->type }}</span>

          <p class="fw-bold mb-1 mt-5">Penjelasan:</p>
          <span class="text-gray-600">{{ $myAssessment->intelligence->content }}</span>

          <p class="fw-bold mb-1 mt-5">Area Pengembangan:</p>
          <span class="text-gray-600">{{ $myAssessment->intelligence->development_area }}</span>

          @if ($myAssessment->user_id)
            <p class="fw-bold mb-1 mt-5">Rekomendasi Ekstrakulikuler:</p>
              @foreach ($myAssessment->intelligence->recomended as $organization)
                <span class="badge badge-light">{{ $organization->organization->name}}</span>
              @endforeach
          @endif
        </div>
        {{-- <div>
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
                  @foreach ($myAssessment->answer as $item)
                  <tr>
                    <td class="py-2 my-0">{{ $item->question->text }}</td>
                    <td class="py-2 my-0 text-center">{{ $item->value }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </tbody>
            </table>
          </div>
        </div> --}}
      </div>
    </div>
    @else
      <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10 mt-10">
        <i class="ki-duotone ki-information-5 fs-5tx text-danger mb-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        <div class="text-center">
            <h1 class="fw-bold mb-5">Kamu Belum Melakukan Tes Minat Bakat</h1>
            <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
            <div class="mb-9 text-gray-900">
                lakukan tes sekarang untuk melihat tipe kecerdasan kamu <br>dan rekomendasi ekstrakulikuler yang cocok untuk kamu 
            </div>
            <div class="d-flex flex-center flex-wrap">
                <a href="#" class="btn btn-outline btn-outline-primary btn-active-danger m-2" data-bs-dismiss="alert">Nanti</a>
                <a href="{{ route('assessment.student') }}" class="btn btn-primary m-2">Tes Sekarang</a>
            </div>
        </div>
      </div>
    @endif
@endif

@endsection
