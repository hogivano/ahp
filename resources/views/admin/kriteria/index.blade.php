@extends('admin.layout.master')
@section('title')
Criteria
@endsection
@section('content')
<div class="row">
  <div class="col">
    <a href="{{ route('kriteria.new') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
  </div>
</div>
<div class="card shadow" style="margin-top: 20px">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">All Criteria</h3>
      </div>
      <div class="col text-right">
        <a href="{{ route('nilai-kriteria.index') }}" class="btn btn-primary" style="padding: 5px 10px;" name="button">Value Criteria</a>
      </div>
    </div>
  </div>
  <div class="table-responsive ">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nama Criteria</th>
          <th scope="col" style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kriteria as $i)
        <tr id="{{ $i->id }}">
          <th scope="row">
            {{ $i->kriteria }}
          </th>
          <td align="center">
            <a class="btn btn-outline-light" style="padding: 5px 10px" href="{{ route('kriteria.edit', $i->id) }}" ><i class="fas fa-edit"></i></a>
            <form class="" style="display:inline" action="{{ route('kriteria.delete') }}" method="post">
              {{ csrf_field() }}
              <input type="text" hidden="hidden" name="id" value="{{ $i->id }}">
              <button type="submit" class="btn btn-outline-light" style="padding: 5px 10px;" onclick="return confirm('Really?')" name="button"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
