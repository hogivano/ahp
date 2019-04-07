@extends('admin.layout.master')
@section('title')
Value Alternative
@endsection
@section('content')
<div class="row">
  <div class="col">
    <a href="{{ route('nilai-alternatif.new') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
  </div>
</div>
<div class="card shadow" style="margin-top: 20px">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Value Alternative</h3>
      </div>
      <div class="col text-right">
        <a href="{{ route('alternatif.index') }}" class="btn btn-primary" style="padding: 5px 10px;" name="button">Alternative</a>
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
        @foreach($alternatif as $i)
        <tr>
          <th style="text-align:center">{{ $i->alternatif }}</th>
          @foreach($i->NilaiAlternatif as $j)
          <td style="text-align:center">{{ $j->nilai }}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
