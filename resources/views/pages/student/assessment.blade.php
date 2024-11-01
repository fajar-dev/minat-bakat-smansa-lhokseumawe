@extends('layouts.app')

@section('content')
<div class="card mb-5 mb-xxl-8">
  <div class="card-body pt-9 pb-0">
    <div class="d-flex flex-wrap flex-sm-nowrap">
      <div class="me-7 mb-4">
        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
          <img src="{{$student->photo_path ? Storage::url($student->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.$student->name}}" alt="image" />
        </div>
      </div>
      <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
          <div class="d-flex flex-column">
            <div class="d-flex align-items-center mb-2">
              <div class="text-gray-900 fs-2 fw-bold me-1">{{$student->name}}</div>
            </div>
            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
              <span class="d-flex align-items-center text-gray-500 mb-2">
              {{$student->student_identity_number}}</span>
            </div>
          </div>
        </div>
        <div class="d-flex flex-wrap flex-stack">
          <div class="d-flex flex-column flex-grow-1 pe-8">
            <div class="d-flex flex-wrap">
              <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                <div class="d-flex align-items-center">
                  <div class="fs-2 fw-bold">{{$student->class}}</div>
                </div>
                <div class="fw-semibold fs-6 text-gray-500">Kelas</div>
              </div>
              <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                <div class="d-flex align-items-center">
                  <div class="fs-2 fw-bold">{{$student->major}}</div>
                </div>
                <div class="fw-semibold fs-6 text-gray-500">Jurusan</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
      <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('student.detail', $student->id) }}">Detail</a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="{{ route('student.assessment', $student->id) }}">Penilaian</a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('student.organization', $student->id) }}">Ekstrakulikuler</a>
      </li>
    </ul>
  </div>
</div>

<div class="card mb-5 mb-xl-10">
  <div class="card-header border-0 cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bold m-0">Penilaian Tes</h3>
    </div>
  </div>
  <div>
    <div class="border-top p-9">
      <div>
        <p class="fw-bold mb-1">Tanggal:</p>
        <span class="text-gray-600">{{ $assessment->created_at }}</span>

        <p class="fw-bold mb-1 mt-5">Tipe Kepribadian (Minat):</p>
        <span class="badge badge-primary">{{ $assessment->personality->type }}</span>

        <p class="fw-bold mb-1 mt-5">Penjelasan:</p>
        <span class="text-gray-600">{!! $assessment->personality->content !!}</span>
    
        <p class="fw-bold mb-1 mt-5">Tipe Kecerdasan (bakat):</p>
        <span class="badge badge-primary">{{ $assessment->intelligence->type }}</span>

        <p class="fw-bold mb-1 mt-5">Penjelasan:</p>
        <span class="text-gray-600">{{ $assessment->intelligence->content }}</span>

        <p class="fw-bold mb-1 mt-5">Area Pengembangan:</p>
        <span class="text-gray-600">{{ $assessment->intelligence->development_area }}</span>

        @if ($assessment->user_id)
          <p class="fw-bold mb-1 mt-5">Rekomendasi Ekstrakulikuler:</p>
            @foreach ($assessment->intelligence->recomended as $organization)
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
                @foreach ($assessment->answer as $item)
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
</div>
@endsection
