@extends('master.app')
@section('title') Data Kompetensi @endsection
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kompetensi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Kompetensi</li>
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
          <h3 class="card-title">Data Kompetensi
            <div style="float: right;">
              <a href="kompetensi/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tabel-kompetensi" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th width="5%">No</th>
                <th>ID</th>
                <th>Nama</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>01</td>
                <td>Finance</td>
                <td><a href="/kompetensi/edit"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>02</td>
                <td>Teknologi</td>
                <td><a href="/kompetensi/edit"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>03</td>
                <td>Public Speaking</td>
                <td><a href="/kompetensi/edit"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('script')
<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#tabel-kompetensi").DataTable();
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

@endsection

