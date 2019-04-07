@extends("admin.layout.master")
@section("title")
    New Alternative
@endsection
@section("content")
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">New Alternative</h3>
            </div>
        </div>
    </div>
    <div class="table-responsive" style="padding: 5px 25px 20px 25px">
        <form action="{{ route('alternatif.create') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Alternative</label>
                <input name="alternatif" type="text" class="form-control" placeholder="alternative">
            </div>
            <button name="btn_kategori" type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="{{ route('alternatif.index')}}">Batal</a>
        </form>
    </div>
</div>
@endsection
