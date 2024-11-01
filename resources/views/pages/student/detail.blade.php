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
        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="{{ route('student.detail', $student->id) }}">Detail</a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('student.assessment', $student->id) }}">Penilaian</a>
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
      <h3 class="fw-bold m-0">Detail Profil</h3>
    </div>
  </div>
  <div>
    <form method="POST" id="form" class="form">
      <div class="card-body border-top p-9">
        <div class="row mb-6">
          <label class="col-lg-4 col-form-labelfw-semibold fs-6">Foto</label>
          <div class="col-lg-8 fv-row">
            <style>.image-input-placeholder { background-image: url('{{ $student->photo_path ? Storage::url($student->photo_path) : asset("assets/media/svg/files/blank-image.svg")}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{ $student->photo_path ? Storage::url($student->photo_path) : asset("assets/media/svg/files/blank-image-dark.svg")}}'); }</style>
            <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
              <div class="image-input-wrapper w-125px h-125px"></div>
            </div>
          </div>
        </div>
        <div class="row mb-6">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
          <div class="col-lg-8 fv-row">
            <input type="text" name="name" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" disabled value="{{$student->name}}" />
          </div>
        </div>
        <div class="row mb-6">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tangal Lahir</label>
          <div class="col-lg-8 fv-row">
            <input type="date" name="birth_date" class="form-control form-control-lg form-control-solid @error('birth_date') is-invalid @enderror" disabled value="{{$student->birth_date}}" />
          </div>
        </div>
        <div class="row mb-6">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">NISN</label>
          <div class="col-lg-8 fv-row">
            <input type="number" name="student_identity_number" class="form-control form-control-lg form-control-solid @error('student_identity_number') is-invalid @enderror" disabled value="{{$student->student_identity_number}}" />
          </div>
        </div>
        <div class="row mb-6">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kelas</label>
          <div class="col-lg-8 fv-row">
            <input type="text" name="class" class="form-control form-control-lg form-control-solid @error('class') is-invalid @enderror" disabled value="{{$student->class}}" />
          </div>
        </div>
        <div class="row mb-6">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jurusan</label>
          <div class="col-lg-8 fv-row">
            <input type="text" name="major" class="form-control form-control-lg form-control-solid @error('major') is-invalid @enderror" disabled value="{{$student->major}}" />
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
