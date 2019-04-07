@extends('admin.layout.master')
@section('title')
Ranking
@endsection
@section('content')
<div class="card shadow" style="margin-top: 20px">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Ranking</h3>
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
          <th scope="col" style="text-align:center">Alternative</th>
          <th scope="col" style="text-align:center">Ranking</th>
        </tr>
      </thead>
      <tbody>
        @foreach($alternatif as $i)
        <tr>
          <th style="text-align:center">{{ $i->alternatif }}</th>
          <td style="text-align:center">{{ $i->nilai }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
