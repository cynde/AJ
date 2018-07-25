@extends('master.app')
@section('title') Edit Data Pegawai @endsection
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
              <li class="breadcrumb-item active">Edit Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form role="form" action="../update/{{$r->nik_pegawai}}" method="post">
          {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              <label for="nik_pegawai">NIK Pegawai</label>
              <input name="nik_pegawai" type="number" class="form-control" id="nik_pegawai" value="{{$r->nik_pegawai}}" required>
            </div>
            <div class="form-group">
              <label for="nama_pegawai">Nama Pegawai</label>
              <input name="nama_pegawai" type="text" class="form-control" id="nama_pegawai" value="{{$r->nama_pegawai}}" required>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="divisi_pegawai">Divisi Pegawai</label>
              <select class="form-control select2" style="width: 100%;" required>
                <option selected="selected">ABC</option>
                <option>AAA</option>
                <option>BBB</option>
                <option>CCC</option>
              </select>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="departemen_pegawai">Departemen Pegawai</label>
              <select name="departemen_pegawai" class="form-control select2" style="width: 100%;" required>
                <option selected="selected">ABC</option>
                <option>AAA</option>
                <option>BBB</option>
                <option>CCC</option>
              </select>
            </div>
            <div class="form-group">
              <label for="jabatan_pegawai">Jabatan</label>
              <select name="jabatan_pegawai" class="form-control select2" style="width: 100%;" required>
                <option selected="selected">ABC</option>
                <option>AAA</option>
                <option>BBB</option>
                <option>CCC</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('script')
<!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Select2 -->
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endsection

