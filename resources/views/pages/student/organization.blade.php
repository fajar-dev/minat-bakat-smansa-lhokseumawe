@extends('layouts.app')

@section('content')
<div class="card mb-5 mb-xxl-8">
  <div class="card-body pt-9 pb-0">
    <div class="d-flex flex-wrap flex-sm-nowrap">
      <div class="me-7 mb-4">
        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
          <img src="{{$student->photo_path ? Storage::url($student->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.$student->name}}" alt="image" />
          <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
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
        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('student.assessment', $student->id) }}">Penilaian</a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="{{ route('student.organization', $student->id) }}">Ekstrakulikuler</a>
      </li>
    </ul>
  </div>
</div>

<div class="card mb-5 mb-xl-10">
  <div class="card-header border-0 cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bold m-0">Ekstrakulikuler Siswa</h3>
    </div>
  </div>
  <div>
    <div class="border-top p-9">
      <table id="table" class="table table-row-dashed table-striped fs-6 gy-5">
        <thead>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-20px">NO</th>
            <th class="min-w-50px">Ekstrakulikuler</th>
            <th class="min-w-100px">Alasan</th>
            <th class="min-w-100px">Tanggal</th>
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
            <td>
              <span>{{ $item->created_at }}</span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
