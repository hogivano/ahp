@extends("admin.layout.master")
@section("title")
    Set Value Alternative
@endsection
@section("content")
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">New Value Alternative</h3>
            </div>
        </div>
    </div>
    <div class="table-responsive" style="padding: 5px 25px 20px 25px">
        <form action="{{ route('nilai-alternatif.create') }}" method="post">
            {{ csrf_field() }}
            <table class="table align-items-center table-flush">
                <thead>
                  <th scope="col">-</th>
                  @foreach($kriteria as $i)
                  <th>{{ $i->kriteria }}</th>
                  @endforeach
                </thead>
                <tbody>
                  @foreach($alternatif as $i)
                  <tr>
                    <td>{{ $i->alternatif }}</td>
                    @foreach($kriteria as $j)
                    <td><input type="text" required class="form-control" name="{{ $i->id . '_' . $j->id }}" value=""></td>
                    @endforeach
                  </tr>
                  @endforeach
                  <td></td>
                </tbody>
            </table>
            <div class="" style="margin-top: 20px">
              <button name="btn_kategori" type="submit" class="btn btn-primary">Simpan</button>
              <a class="btn btn-danger" href="{{ route('nilai-alternatif.index')}}">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $('.opt-select').change(function(){
      if ($(this).val() == 1){
        var arr = $(this).attr('name').split('_');
        var name = 'select[name=' + arr[1] + '_' + arr[0] + ']';
        $(name).val(1);
      } else {
        var arr = $(this).attr('name').split('_');
        var name = 'select[name=' + arr[1] + '_' + arr[0] + ']';
        $(name).val(0);
      }
    });
  });
</script>
@endsection
