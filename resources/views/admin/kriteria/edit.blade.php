@extends("admin.layout.master")
@section("title")
    Edit Criteria
@endsection
@section("content")
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Edit Criteria</h3>
            </div>
        </div>
    </div>
    <div class="table-responsive" style="padding: 5px 25px 20px 25px">
        <form action="{{ route('kriteria.update', $kriteria->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Criteria</label>
                <input name="kriteria" type="text" class="form-control" value="{{ $kriteria->kriteria }}" placeholder="criteria">
            </div>
            <button name="btn_kategori" type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-danger" href="{{ route('kriteria.index')}}">Batal</a>
        </form>
    </div>
</div>
@endsection
