@extends('layouts.main')

@section('content')
  <div class="d-flex flex-column flex-root " style="background-image: url('{{ asset('assets/img/billboard-bg.png') }}')" id="kt_app_root">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card card-flush my-20">
            <form method="POST" action="{{ route('assessment.submit') }}" class="card-body" id="form">
              @csrf
              <input type="hidden" name="type" value="general">
              <div class="mb-10">
                <a href="{{route('home')}}" class="btn btn-light  btn-sm">
                  <i class="ki-duotone ki-black-left fs-1"></i>
                  Kembali ke beranda
                </a>
              </div>
              <div class="mb-10">
                <h1 class="fw-bold">Tes Minat Bakat Siswa</h1>
                <span class="text-gray-700">Multiple Intelligences Score  (MIS)</span>
              </div>
              <div class="row">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="required form-label">Nama</label>
                  <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nama Lengkap"/>
                  @error('name')
                  <div class="text-sm text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="required form-label">Tanggal Lahir</label>
                  <input type="date" name="birth_date" class="form-control form-control-solid @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" placeholder="Tanggal Lahir"/>
                  @error('birth_date')
                  <div class="text-sm text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="required form-label">Hobi</label>
                  <input type="text" name="hobby" class="form-control form-control-solid @error('hobby') is-invalid @enderror" value="{{ old('hobby') }}" placeholder="Hobi"/>
                  @error('hobby')
                  <div class="text-sm text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="mt-10">
                <p class="fw-bold mb-1">Petunjuk Pengisian:</p>
                <ul class="text-gray-600">
                    <li>Ada 9 butir pernyataan pada setiap kelompok pernyataan di bawah ini.</li>
                    <li>Untuk setiap kelompok, buatlah ranking yang sesuai dengan dirimu.</li>
                </ul>
            
                <p class="fw-bold mb-1">Cara Pemberian Ranking:</p>
                <ul class="text-gray-600">
                    <li>Berikan ranking <strong>1 hingga 9</strong> untuk setiap butir pernyataan.</li>
                    <li>Berilah ranking <strong>1</strong> untuk pernyataan yang paling mewakili dirimu.</li>
                    <li>Berilah ranking <strong>2, 3, 4</strong> dan seterusnya untuk pernyataan yang bukan utama.</li>
                    <li>Berilah ranking <strong>9</strong> untuk pernyataan yang sangat tidak mewakili dirimu.</li>
                </ul>
              </div>            
              <div class="table-responsive">
                <table class="table align-middle table-row-dashed table-bordered fs-6 gy-5 mt-10" id="kt_ecommerce_sales_table">
                  <tbody class="fw-semibold text-gray-600">
                    @foreach ($questions as $item)
                      <tr>
                        <td rowspan="2" class="text-center">
                          <span class="text-dark text-hover-primary">{{ $item->id }}</span>
                        </td>
                        <td>
                          <span class="text-dark fs-5">{{ $item->text }}</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex  align-items-center">
                            <span class="text-dark me-3">Setuju</span>
  
                            <div class="d-flex">
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}1" value="1" checked>
                                <label class="form-check-label mt-1" for="question{{ $item->id }}1">1</label>
                              </div>
                        
                              <!-- Radio Button 2 -->
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}2" value="2">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}2">2</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}3" value="3">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}3">3</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}4" value="4">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}4">4</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}5" value="5">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}5">5</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}6" value="6">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}6">6</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}7" value="7">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}7">7</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}8" value="8">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}8">8</label>
                              </div>
  
                              <div class="form-check d-flex flex-column align-items-center me-3">
                                <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" id="question{{ $item->id }}9" value="9">
                                <label class="form-check-label mt-1" for="question{{ $item->id }}9">9</label>
                              </div>
                            </div>
                  
                            <span class="text-dark ms-3">Tidak Setuju</span>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="form-check form-check-custom form-check-primary form-check-solid my-5 pt-3">
                <input class="form-check-input" type="checkbox" required />
                <label class="form-check-label" for="">
                    Saya telah mengisi form ini dengan sebenar benarnya
                </label>
              </div>
              <button type="submit" id="submit" class="btn btn-primary w-100">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress" style="display: none;">Loading... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </form>
          </div>
        </div>
      </div>
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
