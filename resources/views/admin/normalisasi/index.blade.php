@extends('admin.layout.master')
@section('title')
Normalisasi
@endsection
@section('content')
<div class="card shadow" style="margin-top: 20px">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Normalisasi</h3>
      </div>
    </div>
  </div>
  <div class="table-responsive ">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col" style="text-align:center">-</th>
          @foreach($kriteria as $i)
          <th scope="col" style="text-align:center">{{ $i->kriteria }}</th>
          @endforeach
          <th scope="col" style="text-align:center">Skor</th>
          <th scope="col" style="text-align:center">Persen</th>
        </tr>
      </thead>
      <tbody>
        <?php $sumSkor = 0; $sumPersen = 0; ?>
        @foreach($nilai as $i)
        <tr>
          <th style="text-align:center">{{ $i->kriteria }}</th>
          @foreach($i->NilaiNormalisasi1 as $j)
          <td style="text-align:center">{{ $j->nilai }}</td>
          @endforeach
          <td style="text-align:center">{{ $i->SkorNormalisasiKriteria->skor }}</td>
          <td style="text-align:center">{{ $i->SkorNormalisasiKriteria->persen }} %</td>
        </tr>
        <?php $sumSkor = $sumSkor + $i->SkorNormalisasiKriteria->skor; $sumPersen = $sumPersen + $i->SkorNormalisasiKriteria->persen ?>
        @endforeach
        <tr>
          <th></th>
          @foreach($kriteria as $i)
          <th style="text-align:center">{{ $i->TotalNormalisasiKriteria->nilai }}</th>
          @endforeach
          <th style="text-align:center">{{ $sumSkor }}</th>
          <th style="text-align:center">{{ $sumPersen }}</th>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
