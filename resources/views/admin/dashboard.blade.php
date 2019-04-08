@extends('admin.layout.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="text-center" style="margin-bottom: 30px">
  <a href="{{ route('proses') }}" class="btn btn-success" style="font-size: 15px" onclick="return confirm('are you sure all value is done?')" name="button">Process</a>
</div>
<div class="row">
  <div class="col-xl-7">
    <div class="card shadow">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-muted ls-1 mb-1">Ranking</h6>
            <h2 class="mb-0">Ranking Position</h2>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="chart-rank-pos" class="chart-canvas"></canvas>
        </div>
      </div>
    </div>
  </div>
    <div class="col-xl-5 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-light ls-1 mb-1">Detail</h6>
              <h2 class="mb-0">Ranking value</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Alternative</th>
                  <th scope="col">Value</th>
                </tr>
              </thead>
              <tbody>
                @foreach($alternatif as $i)
                <tr>
                  <th>{{ $i->alternatif }}</th>
                  <td>{{ $i->nilai }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row mt-5">
  <div class="col-xl-6 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Check Consistence</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Value</th>
            </tr>
          </thead>
          <tbody>
            @if($cekKonsistensi != null)
            <tr>
              <th>P</th>
              <td>{{ $cekKonsistensi->p }}</td>
            </tr>
            <tr>
              <th>CI</th>
              <td>{{ $cekKonsistensi->ci }}</td>
            </tr>
            <tr>
              <th>RI</th>
              <td>{{ $cekKonsistensi->ri }}</td>
            </tr>
            <tr>
              <th>CR</th>
              <td>{{ $cekKonsistensi->cr }}</td>
            </tr>
            <tr>
              <th>CR %</th>
              <td>{{ $cekKonsistensi->cr_persen }}%  < 10% (
                @if($cekKonsistensi->cr_persen < 10)
                Fill the Requirement
                @else
                No Fill the requirement
                @endif
                )</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Criteria Consistence</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Value</th>
            </tr>
          </thead>
          <tbody>
            @foreach($konsistensi as $i)
            <tr>
              <th>{{ $i->kriteria }}</th>
              <td>{{ $i->nilai }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    var ctx = $('#chart-rank-pos');
    var alternatif = {!! $alternatif !!};
    console.log(alternatif);

    var label = [];
    var value = [];
    for(var data in alternatif){
      label.push(alternatif[data]['alternatif']);
      value.push(alternatif[data]['nilai']);
    }

    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: '# of Votes',
            data: value,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

  });
</script>
@endsection
