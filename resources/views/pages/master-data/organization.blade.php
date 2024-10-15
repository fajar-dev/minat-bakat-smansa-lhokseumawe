@extends('layouts.app')

@section('content')
<div class="card card-flush">
  <div class="card-body table-responsive">
    <table class="table align-middle table-row-dashed table-striped fs-6 gy-5">
      <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="min-w-50px ps-3">No</th>
          <th class="min-w-150px">Kegiatan</th>
          <th class="min-w-200px">Pembina</th>
        </tr>
      </thead>
      <tbody class="fw-semibold text-gray-600">
        <?php $no = 1; ?>
        <?php foreach ($organization as $org_category): ?>
          <tr>
            <td colspan="3">
              <span class="text-gray-900 ps-3 fw-bold"><?= chr(64 + $no++) ?>.</span>
              <span class="text-gray-900 ps-3 fw-bold"> <?= $org_category->name ?></span>
            </td>
          </tr>
          <?php foreach ($org_category->organization as $org): ?>
            <tr>
              <td>
                <span class="ps-5"><?= $org->id ?></span>
              </td>
              <td class="pe-0">
                <span class="fw-bold"><?= $org->name ?></span>
              </td>
              <td class="pe-0">
                <span class="fw-bold">
                  <?php 
                    $coaches = json_decode($org->coach, true);
                    foreach ($coaches as $coach) {
                      echo $coach['name'] . ' (' . $coach['position'] . ')<br>';
                    }
                  ?>
                </span>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    
    <!--end::Table-->
  </div>

</div>

@endsection
