@extends('layouts.main')

@section('content')
  <div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="mb-0" id="home">
      <div class="bgi-no-repeat bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url({{ asset('assets/img/billboard-bg.png') }})">
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
          <div class="container">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center flex-equal">
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                  <i class="ki-outline ki-abstract-14 fs-2hx"></i>
                </button>
                <a href="#">
                  <img alt="Logo" src="{{ asset('assets/img/logo-sekolah.png') }}" class="logo-default h-50px h-lg-50px" />
                  <img alt="Logo" src="{{ asset('assets/img/logo-sekolah.png') }}" class="logo-sticky h-50px h-lg-50px" />
                </a>
              </div>
              <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                  <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-dark menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
                    <div class="menu-item">
                      <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
                    </div>
                    <div class="menu-item">
                      <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#tentang" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
                    </div>
                    <div class="menu-item">
                      <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#tipe-kepribadian" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tipe Kepribadian</a>
                    </div>
                    <div class="menu-item">
                      <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#tipe-kecerdasan" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tipe Kecerdasan</a>
                    </div>
                    <div class="menu-item">
                      <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#prestasi" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Prestasi</a>
                    </div>
                    <div class="menu-item">
                      <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tim Pengabdian</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-equal text-end ms-1">
                @if (Auth::check())
                  <div class="d-flex justify-content-end">
                    <div class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                      <div class="d-flex flex-center cursor-pointer symbol symbol-circle symbol-40px">
                        <img src="{{ Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='. Auth::user()->name}}" alt="image" />
                      </div>
                      <div class="d-flex flex-column align-items-start justify-content-center ms-3">
                        <span class="text-gray-500 fs-8 fw-semibold">Hello</span>
                        <a href="#" class="text-dark fs-7 fw-bold text-hover-primary">{{ Auth::user()->name }}</a>
                      </div>
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                      <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                          <div class="symbol symbol-50px me-5">
                            <img alt="Logo" src="{{ Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.Auth::user()->name}}" />
                          </div>
                          <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}</div>
                            <span class="fw-semibold text-muted text-hover-primary fs-7">
                              @if (Auth::user()->role == 'user')
                                {{ Auth::user()->class }} - {{ Auth::user()->major}} 
                              @else
                                {{ Auth::user()->email }}</span>
                              @endif
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="separator my-2"></div>
                      <div class="menu-item px-5">
                        <a href="{{ route('dashboard') }}" class="menu-link px-5">Dashboard</a>
                      </div>
                      <div class="menu-item px-5">
                        <a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a>
                      </div>
                    </div>
                  </div>
                @else
                  <a href="{{ route('login') }}" class="text-primary fw-bold me-5 fs-4">Sign In</a>
                  <a href="{{ route('register') }}" class="btn btn-light-primary">Sign Up</a>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
          <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
            <img class=" w-275px w-md-50 w-xl-400px mb-10 mb-lg-20" src="{{ asset('assets/img/logo-sman1-lhokseumawe.png') }}" alt=""/>                 
            <h1 class="text-dark lh-base fw-bold fs-2x mb-15">Minat Bakat Siswa
            <br />
            <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
              <span id="kt_landing_hero_text">SMA Negeri 1 Lhokseumawe</span>
            </span></h1>
            <a href="index.html" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#category">Mulai Tes Sekarang</a>
          </div>
        </div>
      </div>
    </div>

    <div class="py-10 py-lg-20 mt-10">
      <div class="container" id="tentang" data-kt-scroll-offset="{default: 100, lg: 150}">
        <div class="row">
          <div class="col-md-6">
            <div class="octagon mx-auto d-flex w-lg-500px h-300px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/tentang.jpg') }}')"></div>
          </div>
          <div class="col-md-6">
            <h3 class="fs-2hx text-gray-900 mb-2">
              Tentang
            </h3>
            <p class="fs-5">Salah satu faktor pendukung tingginya tingkat pendidikan di sekolah adalah adanya pembinaan minat dan bakat siswa melalui program kegiatan ektrakurikuler yang baik. Melalui website ini, siswa bisa mengetahui minat dan bakatnya sehingga memberikan rekomendasi sebelum memilih kegiatan ekstrakurikuler yang akan diikuti.</p>
            <ul>
              <li>Dapat membantu siswa dalam mengetahui dan menemukan minat dan bakat yang dimiliki.</li>
              <li>Kegiatan yang dipilih lebih optimal dan dapat membantu meningkatkan prestasi siswa.</li>
              <li>Diharapkan dapat meningkatkan prestasi siswa di bidang ektrakurikuler sekolah.</li>
              <li>Membantu guru dan pihak sekolah dalam mengelola kegiatan ekstrakurikuler di sekolah.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="py-10 py-lg-20 mt-1">
      <div class="container" id="tipe-kepribadian" data-kt-scroll-offset="{default: 100, lg: 150}">
        <div class="text-center mb-17">
          <h3 class="fs-2hx text-gray-900 mb-2">
            Tipe Kepribadian
          </h3>
          <div class="fs-5 text-muted fw-bold">Temukan tipe kepribadian yang kamu miliki</div>
        </div>
        <div class="row">
          <div class="col-md-4 my-3 ">
            <div class="alert alert-dismissible bg-light-primary d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/realistic.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Realistik</h4>
                <span>Mudah mempelajari dan senang bekerja
                  dengan alat-alat atau mesin dan juga suka dengan hewan</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-info d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/investigatif.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Investigatif</h4>
                <span>Senang belajar dan memecahkan soal-soal matematika
                  dan ilmu pengetahuan alam (science)</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-warning d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/artistik.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Artistik</h4>
                <span>Senang melakukan aktivitas kreatif seperti melukis, drama,
                  kerajinan, tari, musik maupun menulis kreatif</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-danger d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/sosial.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Sosial</h4>
                <span>Senang melakukan hal-hal yang membantu orang lain misalnya,
                  mengajar, merawat, menyampaikan informasi</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-success d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/giat.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Giat</h4>
                <span>Senang memimpin dan meyakinkan/memengaruhi orang lain,
                  juga menjual sesuatu barang maupun ide</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-secondary d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/konvensional.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Konvensional</h4>
                <span>Senang mengutak-atik angka, catatan arsip, atau
                  peralatan, sistematis dan terukur</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-10 py-lg-20 mt-1">
      <div class="container" id="tipe-kecerdasan" data-kt-scroll-offset="{default: 100, lg: 150}">
        <div class="text-center mb-17">
          <h3 class="fs-2hx text-gray-900 mb-2">
            Tipe Kecerdasan
          </h3>
          <div class="fs-5 text-muted fw-bold">Temukan tipe kecerdasan yang kamu miliki</div>
        </div>
        <div class="row">
          <div class="col-md-4 my-3 ">
            <div class="alert alert-dismissible bg-light-primary d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/kinestetik.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Kinestetik</h4>
                <span>Olah gerak, seni rupa, seni musik</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-info d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/logis.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Logis-Matematis</h4>
                <span>Merancang program komputer sederhana, bermain dengan angka, problem-solving project</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-warning d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/verbal.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Verbal/Linguistik</h4>
                <span>Membaca, menulis dan review buku – bermain dengan kata-kata</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-danger d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/interpersonal.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Interpersonal</h4>
                <span>Diskusi kelompok, olahraga kelompok, organisasi</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-success d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/intrapersonal.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Intra Personal</h4>
                <span>Membuat proyek menulis dan eksplorasi topik-topik spesifik</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-secondary d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/naturalistik.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Naturalistik</h4>
                <span>Kegiatan luar ruangan, berhubungan dengan alam</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-warning d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/eksistensial.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Eksistensial</h4>
                <span>Merawat hewan, diskusi buku, belajar Bahasa asing, berinteraksi dengan alam</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-danger d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/musikal.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Musikal</h4>
                <span>Musik dan Menyanyi</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="alert alert-dismissible bg-light-info d-flex flex-row p-5 mb-1 h-100">
              <img alt="Logo" src="{{ asset('assets/img/icon/spasial.png') }}" class="logo-default h-50px pe-5" />
              <div class="d-flex flex-column pe-0 pe-sm-10">
                <h4 class="fw-semibold">Spasial Visual</h4>
                <span>Kegiatan yang berhubungan dengan ruang dan struktur 3D</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-10 py-lg-20 mt-1">
      <div class="container" id="prestasi" data-kt-scroll-offset="{default: 100, lg: 150}">
        <div class="text-center mb-17">
          <h3 class="fs-2hx text-gray-900 mb-2">
            Prestasi
          </h3>
          <div class="fs-5 text-muted fw-bold">Prestasi Siswa</div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card card-flush">
              <div class="card-body table-responsive">
                <table class="table align-middle table-row-dashed table-striped fs-6 gy-5" id="table">
                  <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                      <th class="min-w-200px">Siswa</th>
                      <th class="min-w-100px">Nama Kegiatan</th>
                      <th class="min-w-100px">Tanggal Kegiatan</th>
                      <th class="min-w-100px">Tipe Prestasi</th>
                      <th class="min-w-100px">Nama Prestasi</th>
                    </tr>
                  </thead>
                  <tbody class="fw-semibold text-gray-800">
                      @foreach ($achievement as $index => $item)     
                      <tr>
                        <td class="d-flex align-items-center min-w-150px">
                          <div class="symbol-group symbol-hover me-3">
                            <div class="symbol symbol-45px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->user->name }}">
                              <img src="{{ $item->user->photo_path ? Storage::url($item->user->photo_path) : 'https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name='.$item->user->name}}" alt="">
                            </div>
                          </div>
                          <div class="d-flex flex-column">
                            <span class="text-gray-800 fw-bold mb-1">{{ $item->user->name }}</span>
                            <span class="text-gray-600 fs-7">{{ $item->user->student_identity_number }}</span>
                            <span class="text-gray-600 fs-7">{{ $item->user->class }} - {{ $item->user->major }}</span>
            
                          </div>
                        </td>
                        <td class="pe-0">
                          <span>{{ $item->activity_name }}</span>
                        </td>
                        <td class="pe-0">
                          <span>{{ $item->date }}</span>
                        </td>
                        <td class="pe-0">
                          <span>{{ $item->type }}</span>
                        </td>
                        <td class="pe-0">
                          <span>{{ $item->achievement_name }}</span>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="py-10 py-lg-20 mt-1">
      <div class="container"  id="team" data-kt-scroll-offset="{default: 100, lg: 150}"">
        <div class="text-center mb-12">
          <h3 class="fs-2hx text-gray-900 mb-2">Tim Pengabdian</h3>
          <div class="fs-5 text-muted fw-bold">TIm pengabdian Universitas Malikussaleh</div>
        </div>
        <div class="tns tns-default" style="direction: ltr">
          <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/nanda.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Nanda Savira Ersa, ST., MT</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Ketua Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/nura.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Nura Usrina, ST., MT</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/zara.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Zara Yunizar, S.Kom., M.Kom</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/fauzan.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">M. Fauzan, ST., MT</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/lukman.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Isna Rezkia Lukman, S.Pd., M.Pd</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/misbah.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Misbahul Jannah, ST., MT</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/majid.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">O.K. Muhammad Majid Maulana</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
            <div class="text-center">
              <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('assets/img/team/ditya.jpg') }}')"></div>
              <div class="mb-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Ditya Larasati Putri</a>
                <div class="text-muted fs-6 fw-semibold mt-1">Anggota Tim</div>
              </div>
            </div>
          </div>
          <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
            <i class="ki-outline ki-left fs-2x"></i>
          </button>
          <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
            <i class="ki-outline ki-right fs-2x"></i>
          </button>
        </div>
      </div>
    </div>

    <div class="mb-0">
      <div class="landing-light-bg">
        <div class="container">
          <div class="row py-10 py-lg-20 text-center">
            <div class="col-12">
              <div>
                <img alt="Logo" src="{{ asset('assets/img/logo-sekolah.png') }}" class="h-50px" />
              </div>
              <p class="fw-bold fs-3 pt-10 pb-2 mb-0">SMA Negeri 1 Lhokseumawe</p>
              <span>Jl. Darussalam Kp. Jawa Lama Kecamatan Banda Sakti Kota Lhokseumawe, Aceh</span><br>
              <span class="text-gray-500">sman1lhokseumawe1957@gmail.com | sman1lsw@yahoo.co.id | +62 822 7780 0022</span>
              <div class="mt-5">
                <span class="mx-5 fs-6 mt-10 fw-semibold text-gray-600 pt-1">&copy; 2024 Tim Pengabdian Universitas Malikussaleh.</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <i class="ki-outline ki-arrow-up"></i>
    </div>
  </div>


<div class="modal fade" tabindex="-1" id="category">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pilih Kategori Tes</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
              <a href="{{ route('assessment.student') }}" class="btn btn-primary w-100">Siswa SMAN 1 Lhokseumawe</a>
              <a href="{{ route('assessment.general') }}" class="btn btn-light-primary w-100 mt-5">Umum</a>
            </div>
    </div>
</div>

@section('script')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
  $("#table").DataTable();
</script>
@endsection
@endsection
