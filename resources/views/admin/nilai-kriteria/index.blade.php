@extends('admin.layout.master')
@section('title')
Value Criteria
@endsection
@section('content')
<div class="row">
  <div class="col">
    <a href="{{ route('nilai-kriteria.new') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
  </div>
</div>
<div class="card shadow" style="margin-top: 20px">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Value Criteria</h3>
      </div>
      <div class="col text-right">
        <a href="{{ route('kriteria.index') }}" class="btn btn-primary" style="padding: 5px 10px;" name="button">Criteria</a>
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
        </tr>
      </thead>
      <tbody>
        @foreach($nilai as $i)
        <tr>
          <th style="text-align:center">{{ $i->kriteria }}</th>
          @foreach($i->NilaiKriteria1 as $j)
          <td style="text-align:center">{{ $j->nilai }}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
